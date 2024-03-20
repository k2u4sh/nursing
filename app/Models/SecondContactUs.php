<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecondContactUs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'second_contact_us';

    protected $fillable = ['email', 'phone', 'address'];
}
