<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $append = ['orignal_image'];
    
    public function subSection()
    {
        return $this->hasMany(SubSection::class, 'section_id');
    }

    public function page()
    {
        return $this->belongsTo(MenuPage::class, 'page_id');
    }

    public function getImageAttribute($value)
    {
        return $value ? asset('storage/Section/'.$value) : NULL;
    }

    public function getJaImageAttribute($value)
    {
        return $value ? asset('storage/Section/'.$value) : asset('front/img/default.png');
    }

    public function getOrignalImageAttribute($value)
    {
        return $this->getRawOriginal('image');
    }

    public function getVideoUrlAttribute($value)
    {
        // if($value) {
        //     return 'https://www.youtube.com/embed'.'/'.$value;
        // } else {
        //     return NULL;
        // }
        return $value ? asset('storage/Video/'.$value) : NULL;

    }
}
