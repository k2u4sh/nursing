<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessService extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'from', 'from_format', 'to', 'to_format'];
}
