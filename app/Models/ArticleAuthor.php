<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleAuthor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getProfileAttribute($value)
    {
        return $value ? asset('storage/Profile/'.$value) : NULL;
    }
}
