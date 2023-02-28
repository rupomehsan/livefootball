<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotesView extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function quotes(){
        return $this->belongsTo(Quotes::class);
    }


}
