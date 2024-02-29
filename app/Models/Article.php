<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];
    
    public function getImageAttribute($value)
    {
        if(isset($value) && isset($value) && Storage::disk('public')->exists('Article/'.$value)){
            return asset('storage/Article/'.$value);
        }else{
            return asset('/front/img/default.webp');
        }
        // return $value ? asset('storage/Article/'.$value) : NULL;
    }

    public function getSubImageAttribute($value)
    {
        if(isset($value) && isset($value) && Storage::disk('public')->exists('Article/'.$value)){
            return asset('storage/Article/'.$value);
        }
        // else{
        //     return asset('/front/img/default.webp');
        // }
        // return $value ? asset('storage/Article/'.$value) : NULL;
    }

     public function getThumbImgAttribute($value)
    {
        
        if(isset($value) && isset($value) && Storage::disk('public')->exists('ArticleThumb/'.$value)){
            return asset('storage/ArticleThumb/'.$value);
        }else if(isset($this->attributes['image']) && Storage::disk('public')->exists('Article/'.$this->attributes['image'])){
            return asset('storage/Article/'.$this->attributes['image']);
        }else{
            // return "ekse".$this->attributes['image'];
            return asset('/front/img/default.webp');
        }
    }

    public function categories()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }

    public function authors()
    {
        return $this->belongsTo(ArticleAuthor::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }
}
