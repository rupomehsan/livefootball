<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $casts = [
        "team_id" =>'array'
    ];

    public  function group_team(){
        return $this->hasMany(GroupTeam::class);
    }

    public  function tournament(){
        return $this->belongsTo(Tournament::class);
    }



}
