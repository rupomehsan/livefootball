<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ForgotPasswordCode;
use App\Models\ForgotPasswordRequest;
use App\Models\Smtp;
use App\Mail\SendVerificationCodeMail;
use Illuminate\Support\Facades\Mail;
use Validator;

use Hash;

class ResetPasswordController extends Controller
{


    public function generateRandomString($length)
    {
        $characters       = '0123456789';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * @OA\Post(
     ** path="/auth/user/forgot-password",
     *   operationId="forgotPassword",
     *   tags={"Auth"},
     *   summary="Send email verification code which can use verify, you are a valid user.",
     *   @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"email"},
     *               @OA\Property(property="email", type="email"),
     *            ),
     *        ),
     *    ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=500,
     *      description="Server error"
     *   )
     *)
     **/

    public function forgotPassword(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make(request()->all(), [
                'email'    => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->messages();
                return validateError($errors);
            }
            $user = User::where('email', $request->email)->first();
            // dd($user);
            if (!$user) {
                return response([
                    'status'  => 'error',
                    'message' => 'No user found with this Email.',
                ],404);
            }
            $prevCode = ForgotPasswordCode::where('email', $request->email)->first();
            if (!empty($prevCode)) {
                $prevCode->delete();
            }
            $prevRequest = ForgotPasswordRequest::where('email', $request->email)->first();
            if (!empty($prevRequest)) {
                $prevRequest->delete();
            }
            $code                    = new ForgotPasswordCode;
            $code->email             = $request->email;
            $code->verification_code = $this->generateRandomString(6);
            $code->save();
            $forgotRequest         = new ForgotPasswordRequest;
            $forgotRequest->email  = $request->email;
            $forgotRequest->status = 'request';
            $forgotRequest->save();

            if (($code->save()) && ($forgotRequest->save())) {
                $smtpSettings = Smtp::first();
                if($smtpSettings){
                    config([
                        'mail.default'                 => 'smtp',
                        'mail.mailers.smtp.host'       => $smtpSettings->host ?? '',
                        'mail.mailers.smtp.port'       => $smtpSettings->port ?? '',
                        'mail.mailers.smtp.encryption' => $smtpSettings->encryption ?? '',
                        'mail.mailers.smtp.username'   => $smtpSettings->username ?? '',
                        'mail.mailers.smtp.password'   => $smtpSettings->password ?? '',
                    ]);
                    Mail::to($request->email)->send(new SendVerificationCodeMail($code->verification_code));
                    return response([
                        'status'            => 'success',
                        'message'           => 'Account verification code send your email, please check your email.',
                        'email'             => $code->email,
                        'verification_code' => $code->verification_code,
                    ], 200);
                }else{
                    return response([
                        'status'  => 'error',
                        'message' => 'Please configure your smtp server.',
                    ], 400);
                }
            }
            // return response([
            //     'status'            => 'success',
            //     'message'           => 'code send your email, please check your email.',
            //     'email'             => $code->email,
            //     'verification_code' => $code->verification_code,
            // ]);
        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ]);
        }
    }



    public function UserVerify(Request $request)
    {
//      dd($request->all()) ;
        try {

            $validate = Validator::make(request()->all(), [
               'email'             => 'required|email|exists:users',
               'code'              => 'required|min:6|max:6'
            ]);

            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }

            $code = ForgotPasswordCode::where('email', $request->email)
                ->where('verification_code',  $request->code )
                ->first();

            if (empty($code)) {
                return response([
                    'status'  => 'error',
                    'message' => 'No code found.',
                ], 404);
            }

            //validation expire check
            if (($code->updated_at->addHour(1)) < (now())) {
                return response([
                    'status'  => 'error',
                    'message' => 'Your code is expired! Please resend code.',
                    'code' => $code->verification_code
                ], 404);
            }

            if (($code->verification_code) ==  $request->code) {
                $forgotRequest         = ForgotPasswordRequest::where('email', $request->email)->first();
                $forgotRequest->status = "matched";
                if ($forgotRequest->update()) {
                    $code->delete();
                    return response([
                        'status'  => 'success',
                        'message' => 'User verified. Go forword for next step.',
                    ], 200);
                }

            }
            return response([
                'status'  => 'error',
                'message' => 'Code not matched',
            ], 404);
        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function changePassword(Request $request)
    {

        try {
//   dd($request->all());

            //   $request->email = "kazal@gmail.com";


            $validator = Validator::make(request()->all(), [
                'new_password'    => 'required',
                'con_new_password' => 'required|string|min:6',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->messages();
                return validateError($errors);
            }

            $forgotRequest = ForgotPasswordRequest::where('email', $request->email)->first();

            if ($forgotRequest->status != 'matched') {
                return response([
                    'status'  => 'error',
                    'message' => 'You have no access to change password. please do before step again.',
                ], 404);
            }

            $target           = User::where('email', $request->email)->first();
            $target->password = Hash::make($request->new_password);

            $forgotRequest->status = 'changed';

            if (($target->update()) && ($forgotRequest->update())) {
                return response([
                    'status'  => 'success',
                    'message' => "Password successfully changed!",
                    "data"=>"reset"
                ], 200);
            }
        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }



    public function resendCode(Request $request)
    {
        // dd($request->all());

        try {
             $validator = Validator::make(request()->all(), [
                'email'    => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->messages();
                return validateError($errors);
            }

            $target = ForgotPasswordCode::where('email', $request->email)->first();
            if (empty($target)) {
                return response([
                    'status'  => 'error',
                    'message' => 'No code found.',
                ], 404);
            }

            $target->verification_code = $this->generateRandomString(6);
            if ($target->update()) {
                Mail::to($request->email)->send(new SendVerificationCodeMail($target->verification_code));
                return response([
                    'status'  => 'success',
                    'message' => 'code send your email, please check your email.',
                    'email'   => $target->email,
                    'code' =>    $target->verification_code
                ]);
            }
        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ]);
        }
    }



}
