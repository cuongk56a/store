<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:sliders|max:255',
            'description' => 'required|min:20',
            'image_path' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được trống',
            'name.unique' => 'Tên không được trùng',
            'name.max' => 'Tên không được quá 255 kí tự',
            'description.required' => 'Mô tả không được trống',
            'description.min' => 'Mô tả không được dưới 20 kí tự',
            'image_path.required' => 'Ảnh không được trống',
        ];
    }
}
