<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_type_id',
        'portfolio_name',
        'portfolio_title',
        'portfolio_image',
        'portfolio_description',
        'portfolio_url',
    ];

    public function portfolio_type() {
        return $this->belongsTo(PortfolioType::class, 'portfolio_type_id');
    }
}
 