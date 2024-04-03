<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill_id',
        'position',
        'company',
        'address',
        'job_description',
        'isPresent',
        'isActive',
        'start_date',
        'end_date',
    ];

    public function skill() {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
