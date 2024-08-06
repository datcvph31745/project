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
            'name' => ['required', 'string', 'max:255'],
            'gia' => ['required', 'integer', 'min:1'],
            'so_luong' => ['required', 'integer', 'min:1'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'id_danh_muc' => ['required', 'exists:danh_mucs,id'],
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Trường tên không được bỏ trống',
            'name.string' => 'Trường tên bắt buộc phải là kiểu dữ liệu ký tự',
            'name.max' => 'Trường tên không được vượt quá 255 ký tự',

            'gia.required' => 'Trường giá không được bỏ trống',
            'gia.integer' => 'Trường giá bắt buộc phải là kiểu số nguyên',
            'gia.min' => 'Trường giá phải lớn hơn hoặc bằng 1',

            'so_luong.required' => 'Trường số lượng không được bỏ trống',
            'so_luong.integer' => 'Trường số lượng bắt buộc phải là kiểu số nguyên',
            'so_luong.min' => 'Trường số lượng phải lớn hơn hoặc bằng 1',

            'image.required' => 'Trường ảnh không được bỏ trống',
            'image.image' => 'Tệp tải lên phải là hình ảnh',
            'image.mimes' => 'Ảnh phải có định dạng: jpg, png, jpeg',
            'image.max' => 'Ảnh không được vượt quá 2048KB',

            'id_danh_muc.required' => 'Trường danh mục không được bỏ trống',
            'id_danh_muc.exists' => 'Danh mục không tồn tại trong cơ sở dữ liệu',
        ];
    }
}

