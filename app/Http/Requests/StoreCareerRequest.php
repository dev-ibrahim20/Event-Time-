<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerRequest extends FormRequest
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
            'requirements_ar' => 'required|string',
            'requirements_en' => 'required|string',
            'sort_order' => 'integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'title_ar.required' => 'حقل اسم الوظيفة بالعربي مطلوب.',
            'title_ar.string' => 'حقل اسم الوظيفة بالعربي يجب أن يكون نصاً.',
            'title_ar.max' => 'حقل اسم الوظيفة بالعربي يجب ألا يزيد عن 255 حرف.',
            'title_en.required' => 'حقل اسم الوظيفة بالإنجليزي مطلوب.',
            'title_en.string' => 'حقل اسم الوظيفة بالإنجليزي يجب أن يكون نصاً.',
            'title_en.max' => 'حقل اسم الوظيفة بالإنجليزي يجب ألا يزيد عن 255 حرف.',
            'requirements_ar.required' => 'حقل متطلبات الوظيفة بالعربي مطلوب.',
            'requirements_ar.string' => 'حقل متطلبات الوظيفة بالعربي يجب أن يكون نصاً.',
            'requirements_en.required' => 'حقل متطلبات الوظيفة بالإنجليزي مطلوب.',
            'requirements_en.string' => 'حقل متطلبات الوظيفة بالإنجليزي يجب أن يكون نصاً.',
        ];
    }
}
