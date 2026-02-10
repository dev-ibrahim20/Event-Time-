<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'slug' => 'required|string|max:255|unique:services',
            'features_ar' => 'required|string',
            'features_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ];
    }

    /**
     * Get the custom error messages for the defined validation rules.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function messages(): array
    {
        return [
            'title_ar.required' => 'حقل اسم الخدمة بالعربي مطلوب.',
            'title_ar.string' => 'حقل اسم الخدمة بالعربي يجب أن يكون نصاً.',
            'title_ar.max' => 'حقل اسم الخدمة بالعربي يجب ألا يزيد عن 255 حرف.',
            'title_en.required' => 'Service name field is required.',
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
        ];
    }
}
