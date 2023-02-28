<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quoter extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function Quotes(){
        return $this->hasMany(Quotes::class);
    }
}
