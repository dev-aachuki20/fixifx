<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getLogoAttribute($value)
    {
        return $value ? asset('storage/Payment/'.$value) : NULL;
    }
}
