<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'sub_title',
        'screenshot',
        'description',
        'url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function multi_images()
    {
        return $this->belongsToMany(
            MultiImage::class, 
            'portfolio_multi_images', 
            'portfolio_id', 
            'multi_image_id'
        );
    }
}
 