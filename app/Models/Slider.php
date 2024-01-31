<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'sub_title',
        'image',
        'video_url',
        'isActive',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
