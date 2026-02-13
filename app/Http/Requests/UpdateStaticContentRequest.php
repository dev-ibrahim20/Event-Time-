<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaticContentRequest extends FormRequest
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
            'value_ar' => 'nullable|string',
            'value_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image_*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'value_ar.string' => 'حقل المحتوى بالعربي يجب أن يكون نصاً.',
            'value_en.string' => 'حقل المحتوى بالإنجليزي يجب أن يكون نصاً.',
            'description_ar.string' => 'حقل الوصف بالعربي يجب أن يكون نصاً.',
            'description_en.string' => 'حقل الوصف بالإنجليزي يجب أن يكون نصاً.',
            'image_*.image' => 'حقل الصورة يجب أن يكون صورة صالحة.',
            'image_*.mimes' => 'حقل الصورة يجب أن يكون من نوع: jpeg, png, jpg, gif.',
            'image_*.max' => 'حجم الصورة يجب ألا يزيد عن 2048 كيلوبايت.',
        ];
    }
}
