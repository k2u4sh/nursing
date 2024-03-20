<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Strip extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'strips';

    protected $fillable = ['name', 'count'];

    protected $dates = ['deleted_at'];
}
