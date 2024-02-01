<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'short_title',
        'short_description',
        'long_description',
        'about_image',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
