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
use Validator;

class TournamentController extends Controller
{
    public function index(Request $request)
    {
//        dd($request->all());
        $tournament = Tournament::all();
        $latestTournament = Tournament::first();
//        dd($latestTournament->id);
        if ($latestTournament) {
            $setPointTable = Group::with(["group_team.team", "tournament"])->where("tournament_id", $latestTournament->id)->get();
            return response([
                "status" => "success",
                "data" => $tournament,
                "setPointTable" => $setPointTable,
            ]);
        } else {
            return response([
                "status" => "success",
                "data" => $tournament,
            ]);
        }

    }

    public function getPointTableByTournamentId($id)
    {
//        dd($request->all());
        $tournament = Tournament::all();
        $latestTournament = Tournament::where("id", $id)->first();
        $totalMatch = Schedule::where("tournament_id",$id)->count() ;
        $totalPlayed = Schedule::where("tournament_id",$id)->where("match_result_status","1")->count() ;
        $remainingMatches = $totalMatch - $totalPlayed;
        if ($latestTournament) {
            $setPointTable = Group::with(["group_team.team", "tournament"])->where("tournament_id", $latestTournament->id)->get();
            return response([
                "status" => "success",
                "setPointTable" => $setPointTable,
                "data" => $tournament,
                "summery"=>[
                    "totalMatch" => $totalMatch,
                    "totalPlayed" => $totalPlayed,
                    "remainingMatches" => $remainingMatches,
                ]
            ]);
        }
    }

    public function scheduleDestroy($id)
    {
//        dd($id);
        Schedule::where("id", $id)->delete();
        MatchWonInfo::where("schedule_id",$id)->delete();
        return response([
            'status' => 'success',
            'message' => 'Schedule Successfully Delete',
        ], 200);
    }

    public function groupTeamDestroy($id)
    {
//        dd($id);
        GroupTeam::where("id", $id)->delete();
        return response([
            'status' => 'success',
            'message' => 'Team Successfully Delete',
        ], 200);
    }

    public function getMatchSchedule($id)
    {
//        dd($id);
        $schedule = Schedule::with(["first_team","second_team"])->where("id", $id)->first();
        return response([
            'status' => 'success',
            'data' => $schedule,
        ], 200);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        try {
            if ($request->id === null) {
                $validate = Validator::make(request()->all(), [
                    "name" => 'required',
//                "image" => 'required',
                ]);
                if ($validate->fails()) {
                    $errors = $validate->errors()->messages();
                    return validateError($errors);
                }

                $tournament = new Tournament();
                $tournament->name = $request->name;
                $tournament->image = $request->image;
                if ($tournament->save()) {
                    return response([
                        'status' => 'success',
                        'message' => "Tournament Successfully Create",
                    ], 200);
                }
            } else {
                $validate = Validator::make(request()->all(), [
                    "name" => 'required',
//                "image" => 'required',
                ]);
                if ($validate->fails()) {
                    $errors = $validate->errors()->messages();
                    return validateError($errors);
                }
                $tournament = Tournament::where("id", $request->id)->first();
                $tournament->name = $request->name ?? $tournament->name;
                $tournament->image = $request->image;
                if ($tournament->update()) {
                    return response([
                        'status' => 'success',
                        'message' => "Tournament Successfully Update",
                    ], 200);
                }
            }

        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function scheduleCreate(Request $request, $id)
    {
//        dd($request->all());
        try {

            $validate = Validator::make(request()->all(), [
                    "match_no" => 'required',
                    "group_id" => 'required',
                    "first_team" => 'required',
                    "second_team" => 'required',
                    "stadium" => 'required',
                    "date" => 'required',
                    "time" => 'required',
            ]);

            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }

            $schedule = new Schedule();
            $schedule->tournament_id = $id;
            $schedule->group_id = $request->group_id;
            $schedule->match_no = $request->match_no;
            $schedule->first_team_id = $request->first_team;
            $schedule->second_team_id = $request->second_team;
            $schedule->stadium = $request->stadium;
            $schedule->date = $request->date;
            $schedule->time = $request->time;
            $schedule->image = $request->image;
            $schedule->created_at = $request->date." ".$request->time;
            if ($schedule->save()) {
                return response([
                    'status' => 'success',
                    'message' => "Schedule Successfully Create",
                ], 200);
            }


        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function scheduleUpdate(Request $request, $id)
    {
//        dd($request->all());
        try {

            $validate = Validator::make(request()->all(), [
                    "match_no" => 'required',
                    "group_id" => 'required',
                    "first_team" => 'required',
                    "second_team" => 'required',
                    "stadium" => 'required',
                    "date" => 'required',
                    "time" => 'required',

            ]);

            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }

            $schedule = Schedule::where("id", $id)->first();
            $schedule->group_id = $request->group_id ?? $schedule->group_id;
            $schedule->match_no = $request->match_no ?? $schedule->match_no;
            $schedule->first_team_id = $request->first_team ?? $schedule->first_team_id;
            $schedule->second_team_id = $request->second_team ?? $schedule->second_team_id;
            $schedule->stadium = $request->stadium ?? $schedule->stadium;
            $schedule->date = $request->date ?? $schedule->date;
            $schedule->time = $request->time ?? $schedule->time;
            $schedule->created_at = $request->date." ".$request->time ?? $schedule->created_at;
            $schedule->image = $request->image ?? $schedule->image;

            if ($schedule->update()) {
                return response([
                    'status' => 'success',
                    'message' => "Schedule Successfully Update",
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
        $getTeam = Tournament::where('id', $id)->first();
        return response([
            "status" => "success",
            "data" => $getTeam
        ]);
//        return view('admin.blog.edit',compact('getBlog'));
    }

    public function getPointTableByTeamId(Request $request)
    {
//        dd($request->all());
        $getTeamPointTable = PointTable::where('tournament_id', (int)$request->tournamentId)->where('team_id', (int)$request->teamId)->first();
//        dd($getTeamPointTable);
        return response([
            "status" => "success",
            "data" => $getTeamPointTable
        ]);
    }

    public function createPointTable(Request $request)
    {
//        dd($request->all());
        $setTeamPointTable = new PointTable();
        $setTeamPointTable->team_id = $request->teamId;
        $setTeamPointTable->tournament_id = $request->seriesId;
        $setTeamPointTable->match_play = $request->matchPlayed ?? 0;
        $setTeamPointTable->win = $request->win ?? 0;
        $setTeamPointTable->loss = $request->loss ?? 0;
        $setTeamPointTable->tied = $request->tied ?? 0;
        $setTeamPointTable->goal = $request->goal ?? 0;
        $setTeamPointTable->point = $request->point ?? 0;
        $setTeamPointTable->save();
        return response([
            "status" => "success",
            "message" => "Point Table Successfully Create"
        ]);
//        return view('admin.blog.edit',compact('getBlog'));
    }

    public function updatePointTable(Request $request)
    {
//        dd($request->all());
        $setTeamPointTable = PointTable::where("tournament_id", $request->tournamentId)->where("team_id", $request->teamId)->first();
        $setTeamPointTable->match_play = $request->matchPlayed ?? $setTeamPointTable->match_play;
        $setTeamPointTable->win = $request->win ?? $setTeamPointTable->win;
        $setTeamPointTable->loss = $request->loss ?? $setTeamPointTable->loss;
        $setTeamPointTable->tied = $request->tied ?? $setTeamPointTable->tied;
        $setTeamPointTable->goal = $request->goal ?? $setTeamPointTable->goal;
        $setTeamPointTable->point = $request->point ?? $setTeamPointTable->point;
        $setTeamPointTable->update();
        return response([
            "status" => "success",
            "message" => "Point Table Successfully Update"
        ]);
//        return view('admin.blog.edit',compact('getBlog'));
    }

    public function getScheduleById($id)
    {
        $getTeam = Schedule::where('id', $id)->get();
        return response([
            "status" => "success",
            "data" => $getTeam
        ]);
//        return view('admin.blog.edit',compact('getBlog'));
    }
  public function getSingleMatchInfoById($id)
    {
        $getSchedule = MatchInformation::with(["schedule.tournament","schedule.group","first_team","second_team"])->where('schedule_id', $id)->first();
        return response([
            "status" => "success",
            "data" => $getSchedule
        ]);
//        return view('admin.blog.edit',compact('getBlog'));
    }

public function getSingleScheduleById($id)
    {
        $getSchedule = Schedule::with(["first_team","second_team","group","tournament"])->where('id', $id)->first();
        return response([
            "status" => "success",
            "data" => $getSchedule
        ]);
//        return view('admin.blog.edit',compact('getBlog'));
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


    public function destroy($id)
    {
//        dd($id);
        Tournament::where("id", $id)->delete();
        Group::where("tournament_id",$id)->delete();
        GroupTeam::where("tournament_id",$id)->delete();
        PointTable::where("tournament_id",$id)->delete();
        Schedule::where("tournament_id",$id)->delete();
        MatchInformation::where("tournament_id",$id)->delete();
        MatchWonInfo::where("tournament_id",$id)->delete();
        return response([
            'status' => 'success',
            'message' => 'Tournament Successfully Delete',
        ], 200);
    }


    public function groupCreate(Request $request)
    {
//        dd($request->all());
        try {
            if ($request->id === null) {
                $validate = Validator::make(request()->all(), [
                    "group_name" => 'required',
//                "image" => 'required',
                ]);
                if ($validate->fails()) {
                    $errors = $validate->errors()->messages();
                    return validateError($errors);
                }

                $group = new Group();
                $group->group_name = $request->group_name;
                $group->tournament_id = $request->tournament_id;
                if ($group->save()) {
                    return response([
                        'status' => 'success',
                        'message' => "Group Successfully Create",
                    ], 200);
                }
            } else {
                $validate = Validator::make(request()->all(), [
                    "name" => 'required',
//                "image" => 'required',
                ]);
                if ($validate->fails()) {
                    $errors = $validate->errors()->messages();
                    return validateError($errors);
                }
                $group = Group::where("id", $request->id)->first();
                $group->group_name = $request->name ?? $group->name;
                $group->tournament_id = $request->tournament_id ?? $group->tournament_id;
                if ($group->update()) {
                    return response([
                        'status' => 'success',
                        'message' => "Group Successfully Update",
                    ], 200);
                }
            }

        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAllTeamByGroupAndTournamentId($id)
    {
        $group = Group::with(["group_team.team", "tournament"])->where("tournament_id", $id)->get();
        $tournament = Tournament::where("id", $id)->first();
        return response([
            "status" => "success",
            "data" => $group,
            "tournament" => $tournament
        ]);
    }

    public function getAllTeamByGroupId($id)

    {
        $getSingleGroup = Group::where("id", $id)->first();
        $group = Group::where("tournament_id", $getSingleGroup->tournament->id)->get();
        return response([
            "status" => "success",
            "data" => [
                "singleGroup" => $getSingleGroup,
                "gettournamentGroup" => $group,
            ]
        ]);
    }

    public function getTournamentId($id)

    {
        $getSingleGroup = Group::where("id", $id)->first();
        $tournamentID = $getSingleGroup->tournament_id;
//        dd($tournamentID);
        return response([
            "status" => "success",
            "data" => $tournamentID
        ]);
    }

    public function getAllGroupByTournamentId($id)
    {
        $getGroup = Group::where("tournament_id", $id)->get();
        return response([
            "status" => "success",
            "data" => $getGroup
        ]);
    }

    public function getAlltEAMByTournamentAndGroupId($id)
    {
        $group = Group::where("id", $id)->first();
        $getTeam = GroupTeam::with(["team"])->where("group_id", $group->id)->where("tournament_id", $group->tournament_id)->get();
        return response([
            "status" => "success",
            "data" => $getTeam
        ]);
    }

    public function getAllScheduleByTournamentId($id)
    {
        $getSchedule = Schedule::with(["tournament", "first_team", "second_team", "group"])->where("tournament_id", $id)->get();
        return response([
            "status" => "success",
            "data" => $getSchedule
        ]);
    }

  public function getAllSchedule()
    {
        $getSchedule = Schedule::with(["tournament", "first_team", "second_team", "group"])->get();
        return response([
            "status" => "success",
            "data" => $getSchedule
        ]);
    }

  public function getPreviousMatch()
    {

        $getSchedule = MatchWonInfo::with(["schedule", "first_team", "second_team", "schedule.group","won_team"])->get();
        return response([
            "status" => "success",
            "data" => $getSchedule
        ]);
    }

    public function tournamentTeamUpdate(Request $request, $id)
    {
//        dd($request->all());
        try {
            $validate = Validator::make(request()->all(), [
                "couch_name" => 'required',
                "description" => 'required',
            ]);
            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }
            $playersData = [];
            $i = 0;
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
//            dd($id);
            $team = Team::where("id", $request->team_id)->first();
            $team->team_name = $request->team_name ?? $team->team_name;
            $team->couch_name = $request->couch_name ?? $team->couch_name;
            $team->players = $playersData ?? $team->players;
            $team->description = $request->description ?? $team->description;
            $team->image = $request->image ?? $team->image;
            if ($team->update()) {
//                dd($id);
                $group = Group::where("id", $id)->first();

                $groupTeam = GroupTeam::where("group_id", $group->id)->where("team_id", $request->team_id)->where("tournament_id", $group->tournament_id)->first();
                if (!$groupTeam) {
                    $groupTeamCreate = new GroupTeam();
                    $groupTeamCreate->tournament_id = $group->tournament_id;
                    $groupTeamCreate->team_id = $request->team_id;
                    $groupTeamCreate->group_id = $group->id;
                    $groupTeamCreate->save();
                    return response([
                        'status' => 'success',
                        'message' => "Team Successfully Update",
                    ], 200);
                } else {
                    $groupTeam->team_id = $request->team_id;
                    $groupTeam->update();
                    return response([
                        'status' => 'success',
                        'message' => "Team Successfully Update",
                    ], 200);
                }
            }
        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


}

