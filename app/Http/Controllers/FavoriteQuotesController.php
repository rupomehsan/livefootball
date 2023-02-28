<?php

namespace App\Http\Controllers;

use App\Models\FavoriteList;
use Illuminate\Http\Request;
use Validator;

class FavoriteQuotesController extends Controller
{
    /**
     * @OA\Post(
     ** path="/favorite/quotes",
     *   operationId="store",
     *   tags={"Favorite"},
     *      security={{"bearerAuth":{}}},
     *   summary="Add a new Video to favorite list",
     *
     *   @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"quotes_id"},
     *               @OA\Property(property="quotes_id", type="int"),
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
     *      response=422,
     *      description="Validation error"
     *   ),
     *   @OA\Response(
     *      response=500,
     *      description="Server error"
     *   )
     *)
     **/
    public function store(Request $request)
    {
        try {
            
            // dd($request->all());

            $favourite = FavoriteList::where("user_id",$request->userId)->where("match_id",$request->matchId)->first();
            
            if(!$favourite){
                $favourite           = new FavoriteList();
                $favourite->match_id = $request->matchId;
                $favourite->user_id  = $request->userId;
                if ($favourite->save()) {
                    return response([
                        'status'  => 'success',
                        'message' => 'Add To Favorite List...',
                    ], 200);
                }
            }else{
                $favourite->delete();
                    return response([
                        'status'  => 'success',
                        'message' => 'Remove from Favorite List...',
                    ], 200);
            }

        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @OA\Get(
     *      path="/favorite/quotes/list",
     *      operationId="show",
     *      tags={"Favorite"},
     *      security={{"bearerAuth":{}}},
     *      summary="Show quotes favorite list",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="server error"
     *      )
     *     )
     */

    public function favoriteList(Request $request)
    {
        // dd($request->auth()->user()->id);
        try {
            $target = FavoriteList::with(['match_info','match_won_info',"match_won_info.team","schedule","schedule.first_team","schedule.second_team"])->where("user_id",$request->userId)->get();
            return response([
                'status' => 'success',
                'data'   => $target,
            ], 200);
        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @OA\post(
     *      path="/favorite/quotes/delete",
     *      operationId="news delete",
     *      tags={"Favorite"},
     *      security={{"bearerAuth":{}}},
     *      summary="delete favorite news list",
     *      @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"news_id"},
     *               @OA\Property(property="news_id", type="int"),
     *            ),
     *        ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="server error"
     *      )
     *     )
     */

    public function favoriteDelete(Request $request)
    {
//         dd($request->all());
        try {
            $target = FavoriteList::where('user_id', auth()->id())->where('quotes_id', $request->quotes_id)->delete();
            return response([
                'status'  => 'success',
                'message' => "Delete From Favorite List",
            ], 200);
        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
