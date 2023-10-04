<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFlagAttribute($value)
    {
        return $value ? asset('front/flags/'.$value) : asset('front/img/flag/usd.svg');
    }
}
