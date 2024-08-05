<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;

    protected $table = 'danh_mucs';

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at' // Sửa lỗi chính tả từ 'update_at' thành 'updated_at'
    ];

    // Lấy tất cả các danh mục với phân trang
    public function loadAllDataDanhmucWithPager()
    {
        return Danhmuc::query()->latest('id')->paginate(10);
    }

    // Thêm danh mục mới
    public function insertDataDanhmuc($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        return Danhmuc::query()->create($params);
    }

    // Lấy thông tin danh mục theo ID
    public function loadIdDataDanhmuc($id)
    {
        return Danhmuc::query()->find($id);
    }

    // Xóa danh mục theo ID
    public function deleteDataDanhmuc($id)
    {
        $category = Danhmuc::query()->find($id);
        if ($category) {
            $category->delete();
            return true;
        }
        return false;
    }

    // Cập nhật danh mục theo ID
    public function updateDataDanhmuc($params, $id)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $category = Danhmuc::query()->find($id);
        if ($category) {
            $category->update($params);
            return true;
        }
        return false;
    }
    public function loadAllDataCategory()
    {
        return Danhmuc::all();
    }
}
