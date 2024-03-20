<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AwardAndRecognition extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'award_and_recognition';

    protected $fillable = [
        'title',
        'description',
        'image',
        'img_title',
        'img_description',
    ];

    protected $dates = ['deleted_at'];
}
