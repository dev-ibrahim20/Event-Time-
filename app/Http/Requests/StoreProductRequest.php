<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_ar' => 'nullable|string|max:255',
            'category_en' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'title_ar.required' => 'حقل اسم المنتج بالعربي مطلوب.',
            'title_ar.string' => 'حقل اسم المنتج بالعربي يجب أن يكون نصاً.',
            'title_ar.max' => 'حقل اسم المنتج بالعربي يجب ألا يزيد عن 255 حرف.',
            'title_en.required' => 'حقل اسم المنتج بالإنجليزي مطلوب.',
            'title_en.string' => 'حقل اسم المنتج بالإنجليزي يجب أن يكون نصاً.',
            'title_en.max' => 'حقل اسم المنتج بالإنجليزي يجب ألا يزيد عن 255 حرف.',
            'description_ar.required' => 'حقل وصف المنتج بالعربي مطلوب.',
            'description_ar.string' => 'حقل وصف المنتج بالعربي يجب أن يكون نصاً.',
            'description_en.required' => 'حقل وصف المنتج بالإنجليزي مطلوب.',
            'description_en.string' => 'حقل وصف المنتج بالإنجليزي يجب أن يكون نصاً.',
            'price.required' => 'حقل السعر مطلوب.',
            'price.numeric' => 'حقل السعر يجب أن يكون رقماً.',
            'price.min' => 'حقل السعر يجب أن يكون 0 أو أكبر.',
            'image.image' => 'حقل الصورة يجب أن يكون صورة صالحة.',
            'image.mimes' => 'حقل الصورة يجب أن يكون من نوع: jpeg, png, jpg, gif.',
            'image.max' => 'حجم الصورة يجب ألا يزيد عن 2048 كيلوبايت.',
        ];
    }
}
