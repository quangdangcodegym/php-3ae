<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationMusic extends FormRequest
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
            'name' => ['required', 'regex:/^[a-z A-Z0-9]{2,20}$/'],
            'description' => ['required', 'regex:/^[a-z A-Z0-9]{2,50}$/'],
            'author_id' => ['required', 'numeric']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên phải được nhập',
            'name.regex' => 'Tên chưa hợp lệ. Phải từ 2-20 chữ cái',
            'description.regex' => 'Thông tin mô tả chưa hợp lệ. Từ 2-50 chữ cái',
            'author_id.regex' => 'Danh mục phải là số',
        ];
    }
}
