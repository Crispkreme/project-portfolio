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

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function abouts()
    {
        return $this->belongsToMany(About::class);
    }

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class);
    }
}
 