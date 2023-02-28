<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['is_favorite'];

    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function quoter(){
        return $this->belongsTo(Quoter::class);
    }

    public function quotes_views(){
        return $this->hasMany(QuotesView::class);
    }
    public function quotes_downloads(){
        return $this->hasMany(QuotesDownload::class);
    }
    
    public function favorite_list()
    {
        return $this->hasMany(FavoriteList::class);
    }

    public function getIsFavoriteAttribute()
    {
        // dd($request->user('sanctum'));
        if(request()->user('sanctum')){
            return $this->favorite_list->where('user_id', request()->user('sanctum')['id'])->first() ? true : false;
        }else{
            return false;
        }
        
    }


}