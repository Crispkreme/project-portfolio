<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'short_description',
        'adress',
        'email',
        'facebook',
        'gmail',
        'instagram',
        'linkin',
        'indeed',
        'upwork',
        'github',
        'instagram',
        'twitter',
        'copyright',
    ];
}
