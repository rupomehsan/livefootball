<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;



class LoginController extends Controller
{
    public function login(Request $request)
    {
//        dd($request->all());
//        $data = json_decode(file_get_contents("php://input"));
        try {
            $validator = Validator::make(request()->all(), [
                'email'    => 'required|exists:users',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->messages();
                return validateError($errors);
            }
            if (!auth()->attempt($validator->validated())) {
                $errors = [
                    'password' => ["Password doesn't matched..."]
                ];
                return validateError($errors);
            }

            $user = User::where("email",$request->email)->first();
            if ($user->user_role_id==1){
                $accessToken = auth()->user()->createToken('authToken');

                return response([
                    'status'  => 'success',
                    'message' => 'Successfully logged in...',
                    'data'    => [
                        'token' => 'Bearer ' . $accessToken->plainTextToken,
                        'user'  => auth()->user(),
                        'role'  => "admin",
                    ],
                ], 200);

            }else{
                $errors = [
                    'email' => ["Unauthorized access this email"]
                ];
                return validateError($errors);
            }


        } catch (Exception $e) {
            return response([
                'status'  => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function userLogin(Request $request)
    {
//        dd($request->all());
//        $data = json_decode(file_get_contents("php://input"));
        try {

            $validator = Validator::make(request()->all(), [
                'email'    => 'required|exists:users',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->messages();
                return validateError($errors);
            }

            if (!auth()->attempt($validator->validated())) {
                $errors = [
                    'password' => ["Password doesn't matched..."]
                ];
                return validateError($errors);
            }

            $accessToken = auth()->user()->createToken('authToken');
            return response([
                'status'  => 'success',
                'message' => 'Successfully logged in...',
                'data'    => [
                    'token' => 'Bearer ' . $accessToken->plainTextToken,
                    'user'  => auth()->user(),
                    'role'  => "user",
                ],
            ], 200);
        } catch (Exception $e) {
            return response([
                'status'  => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }



    public function userSignup(Request $request)
    {
//        dd($request->all());
        try {

            $validator = Validator::make(request()->all(), [
                'name'     => 'required|regex:/^[a-zA-Z-. ]+$/u',
                'email'    => 'required|unique:users|email:rfc,dns',
                'password' => 'min:6|required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->messages();
                return validateError($errors);
            }

            $user                 = new User;
            $user->user_role_id   = 3;
            $user->name           = $request->name;
            $user->email          = $request->email;
            $user->password       = Hash::make($request->password);
            $user->status         = 'active';
            if ($user->save()) {
                return response([
                    'status'  => 'success',
                    'message' => 'Registration successfully done.',
                ], 200);
                // }
            }
        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }



}
