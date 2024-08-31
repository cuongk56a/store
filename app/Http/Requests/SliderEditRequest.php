<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderEditRequest extends FormRequest
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
            'name' => 'max:255',
            'description' => 'min:20',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Tên không được quá 255 kí tự',
            'description.min' => 'Mô tả không được dưới 20 kí tự',
        ];
    }
}
