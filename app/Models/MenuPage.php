<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $append = ['bg_orignal_img'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function subMenu()
    {
        return $this->belongsTo(SubMenu::class, 'sub_menu_id');
    }

    public function getBgImgAttribute($value)
    {
        return $value ? asset('storage/PageCover/'.$value) : NULL;
    }

    public function getIconAttribute($value)
    {
        return $value ? asset('front/img/icons/'.$value) : NULL;
    }

    public function getBgOrignalImgAttribute()
    {
        return $this->getRawOriginal('bg_img');
    }
}
