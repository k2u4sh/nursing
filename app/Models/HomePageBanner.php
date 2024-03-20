<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomePageBanner extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'home_page_banners';

    protected $fillable = [
        'image',
        'title_1',
        'title_2',
        'description',
        // 'btn_content',
        'staff',
        'department',
        'facility',
    ];

    protected $dates = ['deleted_at'];
}
