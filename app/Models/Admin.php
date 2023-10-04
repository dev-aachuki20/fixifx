<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use DateTimeInterface;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name','email','password'
    ];

    protected $hidden = [
        'password','remember_token'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
      return $date->format('Y-m-d H:i:s');
    }

}
