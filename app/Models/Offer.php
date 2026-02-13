<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'discount_percentage',
        'start_date',
        'end_date',
        'status',
        'sort_order',
        'image',
    ];

    protected $casts = [
        'discount_percentage' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getIsActiveAttribute()
    {
        // التحقق من أن العرض مفعّل
        if (!$this->status) {
            return false;
        }
        
        // التحقق من تاريخ البدء
        if ($this->start_date && $this->start_date > now()) {
            return false; // العرض لم يبدأ بعد
        }
        
        // التحقق من تاريخ الانتهاء
        if ($this->end_date && $this->end_date < now()) {
            return false; // العرض انتهى
        }
        
        return true; // العرض صالح الآن
    }
}
