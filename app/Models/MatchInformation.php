<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchInformation extends Model
{
    use HasFactory;
    protected $appends = ['on_date'];
     protected $casts = [
        "first_team_squad"=>"array",
        "second_team_squad"=>"array",
    ];


    public function team(){
        return $this->belongsTo(Team::class,"won_team_id",'id');
    }

    public function getOnDateAttribute(){
        return $this->created_at->toFormattedDateString();
    }

    public function first_team(){
        return $this->belongsTo(Team::class,"first_team_id","id");
    }
    public function second_team(){
        return $this->belongsTo(Team::class,"second_team_id","id");
    }
    public function won_team(){
        return $this->belongsTo(Team::class,"won_team_id","id");
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
    
    
}
