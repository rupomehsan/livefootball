<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotesDownload extends Model
{
    use HasFactory;
    
    public function quotes(){
        return $this->belongsTo(Quotes::class);
    }
}