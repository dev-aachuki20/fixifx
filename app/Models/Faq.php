<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function menuPage()
    {
        return $this->belongsTo(MenuPage::class, 'page_id');
    }
    
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
