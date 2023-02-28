<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupTeam;
use App\Models\MatchInformation;
use App\Models\MatchWonInfo;
use App\Models\PointTable;
use App\Models\Schedule;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Validator;

class TeamController extends Controller
{
    public function index(){
        $team = Team::all();
        // $TodayMatch = Schedule::with(['first_team','second_team'])->whereDate('created_at', Carbon::today())->get();
         $TodayMatch = Schedule::with(['first_team','second_team','tournament','group'])->limit(4)->get();
        return response([
            "status"=>"success",
            "data"=>$team,
            "todayMatch"=>$TodayMatch
        ]);
    }

    public function store(Request $request){
//        dd($request->all());
        try {

            $validate = Validator::make(request()->all(), [
                "team_name" => 'required',
                "couch_name" => 'required',
//                "image" => 'required',
                "description" => 'required',
            ]);
            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }

            $playersData = [];
            $i           = 0;
            if (!empty(($request['players']))) {
                foreach ($request['players']['name'] as $index => $target) {
                    $playersData[$i++]['name'] = $target;
                }
            }
            $j = 0;
            if (!empty(($request['players']))) {
                foreach ($request['players']['role'] as $index => $target) {
                    $playersData[$j++]['role'] = $target;
                }
            }

//            dd($playersData);

            $team = new Team();
            $team->team_name = $request->team_name;
            $team->couch_name = $request->couch_name;
            $team->players = $playersData;
            $team->description = $request->description;
            $team->image = $request->image;

            if ($team->save()) {
                return response([
                    'status' => 'success',
                    'message' => "Team Successfully Create",
                ], 200);
            }
        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function show($id)
    {
        $getTeam = Team::where('id', $id)->get();
        return response([
            "status" => "success",
            "data" => $getTeam
        ]);
//        return view('admin.blog.edit',compact('getBlog'));
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());
        try {

            $validate = Validator::make(request()->all(), [
                "team_name" => 'required',
                "couch_name" => 'required',
//                "image" => 'required',
                "description" => 'required',
            ]);
            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }

            $playersData = [];
            $i           = 0;
            if (!empty(($request['players']))) {
                foreach ($request['players']['name'] as $index => $target) {
                    $playersData[$i++]['name'] = $target;
                }
            }
            $j = 0;
            if (!empty(($request['players']))) {
                foreach ($request['players']['role'] as $index => $target) {
                    $playersData[$j++]['role'] = $target;
                }
            }
//            dd($playersData);
            $team =Team::where("id",$id)->first();
            $team->team_name = $request->team_name ?? $team->team_name;
            $team->couch_name = $request->couch_name ?? $team->couch_name;
            $team->players = $playersData ?? $team->players;
            $team->description = $request->description ?? $team->description;
            $team->image = $request->image ?? $team->image;
            if ($team->save()) {
                return response([
                    'status' => 'success',
                    'message' => "Team Successfully Update",
                ], 200);
            }
        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }

    }

    public function manageApproval(Request $request)
    {

        $target = Quotes::where('id', $request->id)->first();
        $target->status = $request->status;
        if ($target->update()) {
            return response([
                'status' => 'success',
                'message' => "Successfully Update",
            ], 200);
        }


    }

    public function statusControl(Request $request)
    {
        try {
            if ($request->status === 'enable') {
                $target = $request->id;
                if ($target) {
                    foreach ($target as $data) {
                        $target2 = Quotes::where('id', $data)->first();
                        $target2->status = 'active';
                        $target2->update();
                    }
                    return response(['success' => true], 200);
                }
            } else if ($request->status === 'disable') {
                $target = $request->id;
                if ($target) {
                    foreach ($target as $data) {
                        $target2 = Quotes::where('id', $data)->first();
                        $target2->status = 'inactive';
                        $target2->update();
                    }
                    return response(['success' => true], 200);

                }

            } else if ($request->status === 'delete') {
                $target = $request->id;
                if ($target) {
                    foreach ($target as $data) {
                        $target2 = Quotes::where('id', $data)->delete();
                    }
                    return response(['success' => true], 200);

                }

            } else {
                return response([
                    'status' => 'error',
                    'message' => 'Status Did Not Match',
                ], 500);

            }


        } catch (\Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }

    }


    public function fileUploader(Request $request)
    {
//        dd($request->all());
        $validate = Validator::make(request()->only('file'), [
            'file' => 'required|max:10240',
        ]);
        if ($validate->fails()) {
            return response([
                'status' => 'validation_error',
                'data' => $validate->errors(),
            ], 422);
        }
        try {
            if (request()->has('file')) {
                $folder = $request->folder ?? 'all';
                $image = $request->file('file');
                $imageName = $folder . "/" . time() . '.' . $image->getClientOriginalName();
                if (config('app.env') === 'production') {
                    $image->move('uploads/' . $folder, $imageName);
                } else {
                    $image->move(public_path('/uploads/' . $folder), $imageName);
                }
                $protocol = request()->secure() ? 'https://' : 'http://';

                return response([
                    'status' => 'success',
                    'message' => 'File uploaded successfully',
                    'data' => $protocol . $_SERVER['HTTP_HOST'] . '/uploads/' . $imageName,
                ], 200);
            }
        } catch (\Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public  function destroy($id){
//        dd($id);
        Team::where("id",$id)->delete();
        GroupTeam::where("team_id",$id)->delete();
        PointTable::where("team_id",$id)->delete();
        Schedule::where("first_team_id",$id)->orWhere("second_team_id",$id)->delete();
        MatchInformation::where("first_team_id",$id)->orWhere("second_team_id",$id)->delete();
        MatchWonInfo::where("first_team_id",$id)->orWhere("second_team_id",$id)->delete();
        return response([
            'status' => 'success',
            'message' => 'Team Successfully Delete',
        ], 200);
    }



}
