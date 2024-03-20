<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AwardHeader extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'award_headers';

    protected $fillable = ['title', 'description',];

    protected $dates = ['deleted_at'];
}
