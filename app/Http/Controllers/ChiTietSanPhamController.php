<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ChiTietSanPhamController extends Controller
{
    public function chitietSanPham(string $id){
        $sanPham = Product::query()->findOrFail($id);

        $listSanPham = Product::query()->get();
        return view('frontend.sproduct',compact('sanPham','listSanPham'));
    }
}


