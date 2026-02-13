<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papers extends Model
{
    use HasFactory;

    protected $fillable = [
        'official_papers_images',
        'quality_certificates_images',
    ];

    protected $casts = [
        'official_papers_images' => 'array',
        'quality_certificates_images' => 'array',
    ];
}
