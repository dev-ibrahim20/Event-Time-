<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'service_id' => 'required|exists:services,id',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'sort_order' => 'integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'service_id.required' => 'حقل الخدمة مطلوب.',
            'service_id.exists' => 'الخدمة المحددة غير موجودة.',
            'title_ar.required' => 'حقل العنوان بالعربي مطلوب.',
            'title_ar.string' => 'حقل العنوان بالعربي يجب أن يكون نصاً.',
            'title_ar.max' => 'حقل العنوان بالعربي يجب ألا يزيد عن 255 حرف.',
            'title_en.required' => 'حقل العنوان بالإنجليزي مطلوب.',
            'title_en.string' => 'حقل العنوان بالإنجليزي يجب أن يكون نصاً.',
            'title_en.max' => 'حقل العنوان بالإنجليزي يجب ألا يزيد عن 255 حرف.',
            'discount_percentage.required' => 'حقل نسبة الخصم مطلوب.',
            'discount_percentage.numeric' => 'حقل نسبة الخصم يجب أن يكون رقماً.',
            'discount_percentage.min' => 'حقل نسبة الخصم يجب أن يكون 0 أو أكبر.',
            'discount_percentage.max' => 'حقل نسبة الخصم يجب ألا يزيد عن 100%.',
            'start_date.required' => 'حقل تاريخ البدء مطلوب.',
            'start_date.date' => 'حقل تاريخ البدء يجب أن يكون تاريخاً صالحاً.',
            'start_date.after_or_equal' => 'حقل تاريخ البدء يجب أن يكون اليوم أو تاريخاً مستقبلياً.',
            'end_date.required' => 'حقل تاريخ الانتهاء مطلوب.',
            'end_date.date' => 'حقل تاريخ الانتهاء يجب أن يكون تاريخاً صالحاً.',
            'end_date.after' => 'حقل تاريخ الانتهاء يجب أن يكون بعد تاريخ البدء.',
            'image.image' => 'حقل الصورة يجب أن يكون صورة صالحة.',
            'image.mimes' => 'حقل الصورة يجب أن يكون من نوع: jpeg, png, jpg, gif.',
            'image.max' => 'حجم الصورة يجب ألا يزيد عن 2048 كيلوبايت.',
        ];
    }
}
