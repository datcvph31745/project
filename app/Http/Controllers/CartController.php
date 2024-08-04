<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    //
    public function listCart(){

        $cart = session()->get('cart',[]);

        $total = 0;
        $subTotal = 0;
        
        foreach ($cart as $item) {
            # code...
            $subTotal += $item['gia'] * $item['so_luong'];
        }

        $shipping = 30000;
        $total = $subTotal + $shipping;


        return view('frontend.cart',compact('cart','subTotal','shipping','total'));
    }
    
    public function addCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        // dd($request->all());

        $sanpham = Product::query()->findOrFail($productId);

        //khởi tạo 1 mảng chứa thông tin giỏ hàng trên sesion

        $cart = session()->get('cart',[]);

        if(isset($cart[$productId])){
            // sanr phẩm đã tônf tại trong giỏ hàng

            $cart[$productId]['so_luong'] += $quantity;

        }else{
            // sản phâm đa tổn tại trong giỏ hằng
            $cart[$productId] = [
                'name' =>$sanpham->name,
                'gia' => $sanpham->gia,
                'so_luong' =>$quantity ,
                'image' => $sanpham->image,

            ];
        }
        // dd($cart);
        session()->put('cart', $cart);

        return redirect()->back();



    }

    public function updateCart( Request $request){
        $cartNew = $request->input('cart',[]);
        session()->put('cart', $cartNew);
        return redirect()->back();


    }
}
