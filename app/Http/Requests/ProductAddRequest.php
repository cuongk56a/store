<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'category_id'=>'required',
            'contents'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'price.required' => 'Giá không được phép để trống',
            'category_id.required' => 'Danh mục không được phép để trống',
            'contents.required' => 'Nội dung không được phép để trống',
            'name.unique' => 'Tên không được trùng',
            'price.numeric' => 'Giá theo dạng số'
        ];
    }
}
