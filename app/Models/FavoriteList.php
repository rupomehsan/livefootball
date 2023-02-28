<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteList extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $appends = ['on_date'];
    public function getOnDateAttribute(){
        return $this->created_at->toFormattedDateString();
    }
    public function match_info(){
        return $this->belongsTo(MatchInformation::class,"match_id","schedule_id");
    }
    public function match_won_info(){
        return $this->belongsTo(MatchWonInfo::class,"match_id","schedule_id");
    }
    public function schedule(){
        return $this->belongsTo(Schedule::class,"match_id","id");
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
