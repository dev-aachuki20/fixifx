<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSection extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function getImageAttribute($value)
    {
        return $value ? asset('storage/SubSection/'.$value) : NULL;
    }

    public function getJaImageAttribute($value)
    {
        return $value ? asset('storage/SubSection/'.$value) : asset('front/img/default.png');
    }
}
