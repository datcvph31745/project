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
        'update_at'
    ];
    public function loadAllDataCategory(){
        $query = Danhmuc::query()->get();
        return $query;
    }
}

