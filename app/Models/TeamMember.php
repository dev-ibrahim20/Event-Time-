<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name_ar',
        'name_en',
        'position_ar',
        'position_en',
        'bio_ar',
        'bio_en',
        'image',
        'twitter_link',
        'facebook_link',
        'linkedin_link',
        'instagram_link',
        'social_links',
        'featured',
        'sort_order',
        'status',
    ];
    
    protected $casts = [
        'social_links' => 'array',
        'featured' => 'boolean',
        'status' => 'boolean',
    ];
    
    public function getNameAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }
    
    public function getPositionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->position_ar : $this->position_en;
    }
    
    public function getBioAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->bio_ar : $this->bio_en;
    }
    
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
    
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}
