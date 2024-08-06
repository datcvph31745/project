<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Danhmuc;



class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.index');
    }

    public function shop()
    {
        $dmsp = Danhmuc::orderBy('id', 'ASC')->get();
        $sanpham = Product::orderBy('created_at', 'DESC')->paginate(16);
    
        return view('frontend.shop', ['sanpham' => $sanpham, 'dmsp' => $dmsp]);
    }

    //timf san pham them danh muc
    public function sanphamtheodanhmuc($slug) {
        $dmsp = Danhmuc::orderBy('id', 'ASC')->get();
        
        $danhmuc = Danhmuc::where('slug', $slug)->firstOrFail();
        
        $sanpham = Product::where('id_danh_muc', $danhmuc->id) 
            ->orderBy('created_at', 'DESC')
            ->paginate(7); 
        
        return view('frontend.shop', ['sanpham' => $sanpham, 'dmsp' => $dmsp]);
    } 
    
    public function chitietsanpham(){

    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
