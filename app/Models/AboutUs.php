<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_introduction_ar',
        'company_introduction_en',
        'mission_ar',
        'mission_en',
        'vision_ar',
        'vision_en',
        'core_values_ar',
        'core_values_en',
        'message_ar',
        'message_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
