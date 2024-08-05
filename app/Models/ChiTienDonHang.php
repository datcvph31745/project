<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTienDonHang extends Model
{
    use HasFactory;
    protected $fillable =[
        'don_hang_id',
        'dan_pham_id',
        'don_gia',
        'so_luong',
        'thanh_tien',
    ];

    public function donHang(){
        return $this->belongsTo(DonHang::class);
    }

    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
