<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends = ['on_date'];
    public function getOnDateAttribute(){
        return $this->created_at->toFormattedDateString();
    }
    public  function tournament(){
        return $this->belongsTo(Tournament::class);
    }
    public function first_team(){
        return $this->belongsTo(Team::class,"first_team_id","id");
    }
    public function second_team(){
        return $this->belongsTo(Team::class,"second_team_id","id");
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    
    public function match_information(){
        return $this->hasMany(MatchInformation::class,"id","schedule_id");
    }

}
