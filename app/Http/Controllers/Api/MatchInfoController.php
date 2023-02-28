<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MatchInformation;
use App\Models\MatchWonInfo;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Validator;

class MatchInfoController extends Controller
{

      public function matchLinkCreate(Request $request, $id)
    {
        try {
//            dd($request->all());
            $validate = Validator::make(request()->all(), [
                "link" => 'required',
                "link_type" => 'required',
            ]);
            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }

            $firstTeam = [];
            $secondTeam = [];
            if($request->first_squad){
                foreach ($request->first_squad as $index => $data) {
                    $firstTeam[$index] = json_decode($data);
                }
            }

            if($request->second_squad){
                foreach ($request->second_squad as $index => $data) {
                    $secondTeam[$index] = json_decode($data);
                }
            }

        //   dd($firstTeam);
            $schedule = Schedule::where("id",$id)->first();
            $tournament = $schedule->tournament_id;
            $matchInfo = new MatchInformation();
            $matchInfo->schedule_id = $id;
            $matchInfo->tournament_id = $tournament;
            $matchInfo->first_team_id = $request->first_team;
            $matchInfo->second_team_id = $request->second_team;
            $matchInfo->first_team_squad = $firstTeam;
            $matchInfo->second_team_squad = $secondTeam;
            $matchInfo->link = $request->link;
            $matchInfo->link_type = $request->link_type;
            $matchInfo->first_team_captain = $request->first_team_captain;
            $matchInfo->second_team_captain = $request->second_team_captain;
            $matchInfo->first_team_keeper = $request->first_team_goal_keeper;
            $matchInfo->second_team_keeper = $request->second_team_goal_keeper;
            $matchInfo->first_team_couch = $request->first_team_couch;
            $matchInfo->second_team_couch = $request->second_team_couch;
            if ($matchInfo->save()) {
                $schedule = Schedule::where("id", $id)->first();
                $schedule->status = 1;
                $schedule->update();
                return response([
                    "status" => "success",
                    "message" => "Match Successfully Create"
                ]);
            }
        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function matchLinkUpdate(Request $request, $id)
    {
        try {
            // dd($id);
            $validate = Validator::make(request()->all(), [
               "link" => 'required',
               "link_type" => 'required',
            ]);
            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }

            $firstTeam = [];
            $secondTeam = [];
            foreach ($request->first_squad as $index => $data) {
                $firstTeam[$index] = json_decode($data);
            }
            foreach ($request->second_squad as $index => $data) {
                $secondTeam[$index] = json_decode($data);
            }

            $matchInfo = MatchInformation::where("schedule_id", $id)->first();
            // dd($matchInfo);
            $matchInfo->first_team_id = $request->first_team ?? $matchInfo->first_team_id;
            $matchInfo->second_team_id = $request->second_team ?? $matchInfo->second_team_id;
            $matchInfo->first_team_squad = $firstTeam ?? $matchInfo->first_team_squad;
            $matchInfo->second_team_squad = $secondTeam ?? $matchInfo->second_team_squad;
            $matchInfo->link = $request->link ?? $matchInfo->link;
            $matchInfo->link_type = $request->link_type ?? $matchInfo->link_type;
            $matchInfo->first_team_captain = $request->first_team_captain ?? $matchInfo->first_team_captain;
            $matchInfo->second_team_captain = $request->second_team_captain ?? $matchInfo->second_team_captain;
            $matchInfo->first_team_keeper = $request->first_team_goal_keeper ?? $matchInfo->first_team_keeper;
            $matchInfo->second_team_keeper = $request->second_team_goal_keeper ?? $matchInfo->second_team_keeper;
            $matchInfo->first_team_couch = $request->first_team_couch ?? $matchInfo->first_team_couch;
            $matchInfo->second_team_couch = $request->second_team_couch ?? $matchInfo->second_team_couch;
            if ($matchInfo->update()) {
                return response([
                    "status" => "success",
                    "message" => "Match Successfully Update"
                ]);
            }
        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getMatchInformation($id)
    {
//        dd($id);
        $matchInfo = MatchInformation::with(["first_team", "second_team"])->where("schedule_id", $id)->first();
        return response([
            "status" => "success",
            "data" => $matchInfo
        ]);
    }

    public function matchInformationUpdate(Request $request,$id)
    {
//        dd($request->all());
        try {
//            dd($request->all());
            $validate = Validator::make(request()->all(), [
//                "link" => 'required',
            ]);
            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }

//            dd($team);
            $matchInfo = new MatchWonInfo();
            $matchInfo->schedule_id = $id;
            $matchInfo->first_team_id = $request->first_team;
            $matchInfo->second_team_id = $request->second_team;
            $matchInfo->won_team_id = $request->won_team;
            $matchInfo->won_by = $request->won_by;
            $matchInfo->save();
            $schedule = Schedule::where("id",$id)->first();
            $schedule->match_result_status = 1;
            $schedule->status = 1;
            $schedule->update();
                return response([
                    "status" => "success",
                    "message" => "Match Won Information Successfully Update"
                ]);

        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

}

