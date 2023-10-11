<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];
    
    public function getImageAttribute($value)
    {
        return $value ? asset('storage/Article/'.$value) : NULL;
    }

    public function getSubImageAttribute($value)
    {
        return $value ? asset('storage/Article/'.$value) : NULL;
    }

    public function getThumbImgAttribute($value)
    {
        return $value ? asset('storage/ArticleThumb/'.$value) : NULL;
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
