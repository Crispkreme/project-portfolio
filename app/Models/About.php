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

    public function multi_images()
    {
        return $this->belongsToMany(
            MultiImage::class, 
            'about_multi_images', 
            'about_id', 
            'multi_image_id'
        );
    }
}
