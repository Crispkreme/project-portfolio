<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_category',
        'short_title',
        'short_description',
        'long_description',
        'about_image',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function multi_images()
    {
        return $this->belongsToMany(
            MultiImage::class, 
            'blog_multi_images', 
            'blog_id', 
            'multi_image_id'
        );
    }
}
 