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
}
 