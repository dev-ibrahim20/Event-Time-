<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'slug',
        'image',
        'features_ar',
        'features_en',
        'gallery_images',
        'featured',
        'notes',
        'sort_order',
        'status',
    ];
    
    protected $casts = [
        'gallery_images' => 'array',
        'features_ar' => 'array',
        'features_en' => 'array',
        'featured' => 'boolean',
        'status' => 'boolean',
    ];
    
    public static $validationMessages = [
        'title_ar.required' => 'حقل اسم الخدمة بالعربي مطلوب.',
        'title_ar.string' => 'حقل اسم الخدمة بالعربي يجب أن يكون نصاً.',
        'title_ar.max' => 'حقل اسم الخدمة بالعربي يجب ألا يزيد عن 255 حرف.',
        'title_en.required' => 'The service name field is required.',
        'title_en.string' => 'The service name field must be a string.',
        'title_en.max' => 'The service name field must not be greater than 255 characters.',
        'description_ar.required' => 'حقل الوصف بالعربي مطلوب.',
        'description_ar.string' => 'حقل الوصف بالعربي يجب أن يكون نصاً.',
        'description_en.required' => 'The description field is required.',
        'description_en.string' => 'The description field must be a string.',
        'slug.required' => 'حقل الرابط المختصر مطلوب.',
        'slug.string' => 'حقل الرابط المختصر يجب أن يكون نصاً.',
        'slug.max' => 'حقل الرابط المختصر يجب ألا يزيد عن 255 حرف.',
        'slug.unique' => 'هذا الرابط المختصر مستخدم بالفعل.',
        'features_ar.required' => 'حقل المميزات بالعربي مطلوب.',
        'features_ar.string' => 'حقل المميزات بالعربي يجب أن يكون نصاً.',
        'features_en.required' => 'The features field is required.',
        'features_en.string' => 'The features field must be a string.',
        'icon.string' => 'حقل الأيقونة يجب أن يكون نصاً.',
        'icon.max' => 'حقل الأيقونة يجب ألا يزيد عن 100 حرف.',
        'image.image' => 'حقل الصورة يجب أن يكون صورة صالحة.',
        'image.mimes' => 'حقل الصورة يجب أن يكون من نوع: jpeg, png, jpg, gif.',
        'image.max' => 'حجم الصورة يجب ألا يزيد عن 2048 كيلوبايت.',
        'gallery_images.*.image' => 'كل الصور في المعرض يجب أن تكون صوراً صالحة.',
        'gallery_images.*.mimes' => 'صور المعرض يجب أن تكون من نوع: jpeg, png, jpg, gif.',
        'gallery_images.*.max' => 'حجم كل صورة يجب ألا يزيد عن 2048 كيلوبايت.',
        'sort_order.integer' => 'حقل ترتيب العرض يجب أن يكون رقماً.',
        'sort_order.min' => 'حقل ترتيب العرض يجب أن يكون 0 أو أكبر.',
        'featured.boolean' => 'حقل الخدمة المميزة يجب أن يكون true أو false.',
        'status.boolean' => 'حقل الحالة يجب أن يكون true أو false.',
        'notes.string' => 'حقل الملاحظات يجب أن يكون نصاً.',
        'notes.max' => 'حقل الملاحظات يجب ألا يزيد عن 1000 حرف.',
    ];
    
    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }
    
    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }
    
    public function getFeaturesAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->features_ar : $this->features_en;
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
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function getRouteKey()
    {
        return 'slug';
    }
    
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
    
    public function activeOffers()
    {
        return $this->offers()->where('status', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }
}
