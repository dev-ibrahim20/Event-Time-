<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value_ar',
        'value_en',
        'type',
        'description_ar',
        'description_en',
    ];

    protected $casts = [
        'value_ar' => 'string',
        'value_en' => 'string',
        'description_ar' => 'string',
        'description_en' => 'string',
    ];

    public function getValueAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->value_ar : $this->value_en;
    }

    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function scopeByKey($query, $key)
    {
        return $query->where('key', $key);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Static methods for easy access
    public static function getValue($key, $default = null)
    {
        $content = static::where('key', $key)->first();
        if ($content) {
            return app()->getLocale() === 'ar' ? $content->value_ar : $content->value_en;
        }
        return $default;
    }

    public static function getDescription($key, $default = null)
    {
        $content = static::where('key', $key)->first();
        if ($content) {
            return app()->getLocale() === 'ar' ? $content->description_ar : $content->description_en;
        }
        return $default;
    }

    public static function getHomeImage()
    {
        return static::getValue('home_image', '/assets/img/placeholder.jpg');
    }

    public static function getPhone()
    {
        return static::getValue('phone', '+966500000000');
    }

    public static function getEmail()
    {
        return static::getValue('email', 'info@example.com');
    }

    public static function getMapUrl()
    {
        return static::getValue('map_url', 'https://maps.google.com');
    }

    public static function getAddress()
    {
        return static::getValue('address', 'الرياض، المملكة العربية السعودية');
    }

    public static function getDetails()
    {
        return static::getDescription('details', 'تفاصيل إضافية');
    }
}
