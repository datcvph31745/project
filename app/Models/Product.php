<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{


    use HasFactory;
    protected $table = 'san_phams';
    protected $fillable = [
        'id',
        'name',
        'gia',
        'so_luong',
        'image',
        'id_danh_muc',
        'created_at',
        'updated_at'
    ];
    public function listCate(){
        return $this->belongsTo(Danhmuc::class, 'id_danh_muc');
    }
    public function loadAllDataProductWithPager(){
        // ORM
        $query = Product::query()
            ->with('listCate')
            ->latest('id')
            ->paginate(10);
        return $query;

    }
    public function insertDataProduct($params){
        $params['created_at'] = date('Y-m-d H:i:s');
        $res = Product::query()->create($params);
        return $res;
    }
    public function loadIdDataProduct($id){
        $query = Product::query()->find($id);
        return $query;
    }
    public function deleteDataProduct($id){
        $query = Product::query()
            ->find($id)
            ->delete();
        return $query;
    }
    public function upadateDataProduct($params, $id){
        $params['updated_at'] = date('Y-m-d H:i:s');
        $res = Product::query()->find($id)->update($params);
        return $res;


    } 


}

