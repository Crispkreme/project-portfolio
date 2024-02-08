<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'multi_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blogs()
    {
        return $this->belongsToMany(
            Blog::class,
            'blog_multi_images', 
            'multi_image_id', 
            'blog_id'
        );
    }

    public function abouts()
    {
        return $this->belongsToMany(
            About::class, 
            'about_multi_images', 
            'multi_image_id', 
            'about_id'
        );
    }

    public function portfolios()
    {
        return $this->belongsToMany(
            Portfolio::class, 
            'portfolio_multi_images', 
            'multi_image_id', 
            'portfolio_id'
        );
    }
}
 