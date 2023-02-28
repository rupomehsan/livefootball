<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Quoter;
use App\Models\Quotes;
use App\Models\QuotesView;
use App\Models\Schedule;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function getTodayMatch()
    {
        // $TodayMatch = Schedule::with(['first_team','second_team'])->where("match_result_status",0)->whereDate('created_at', Carbon::today())->get();
        $TodayMatch = Schedule::with(['first_team','second_team'])->where("match_result_status",0)->limit(3)->get();
        $todaMatchCount = Schedule::whereDate('created_at', Carbon::today())->count();
        return response([
            "status"=>"success",
            "data"=> $TodayMatch,
            "count"=> $todaMatchCount
        ]);
    }
}
