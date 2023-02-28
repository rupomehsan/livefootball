<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebAdvertisement extends Model
{
    use HasFactory;
    protected $casts = [
        "web_adds"=>"array"
    ];
}
