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
            // 'name'=>['required', 'string', 'max:255'],
            // 'gia'=>['required', 'integer', 'min:1'],
            // 'so_luong'=>['required', 'integer', 'min:1'],
            // 'image'=>['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            // 'id_danh_muc'=>['required', 'exists:categories,id'],
        ];
    }
    public function messages():array
    {
        return [
            // 'name.required' => 'Trường tên không được bỏ trống',
            // 'name.string' => 'Trường tên yêu bắt buộc là KDL ký tự',
            // 'name.max' => 'Trường tên không được vươợt quá 255 ký tự',
            // Lab 5
        ];
    }
}
