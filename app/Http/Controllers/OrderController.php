<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\DonHang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Mail;
use App\Mail\OrderComfirm;



class OrDerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        return view('donhang.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cart = session()->get('cart',[]);
        if(!empty($cart)){
            $total = 0;
            $subtotal = 0;
            foreach ($cart as $item) {
                # code...
                $subtotal +=$item['gia']*$item['so_luong'];
            }

            $shipping = 30000;
            $total = $subtotal + $shipping;
            return view('donhang.create',compact('cart','subtotal','total','shipping'));

        }
        return redirect()->route('list');

        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
    
        try {
            $params = $request->except('_token');
            $params['ma_don_hang'] = $this->generateUniqueOrderCode();
    
            $donHang = DonHang::create($params);
            $donHangId = $donHang->id;
    
            $carts = session()->get('cart', []);
            foreach ($carts as $key => $item) {

                $thanhTien = $item['gia'] * $item['so_luong'];
            
                $donHang->chiTietDonHang()->create([
                    'don_hang_id' => $donHangId,
                    'san_pham_id' => $key,
                    'don_gia' => $item['gia'],
                    'so_luong' => $item['so_luong'],
                    'thanh_tien' => $thanhTien
                ]);
            }
            
    
            DB::commit();
    
            return redirect()->route('cart.list')->with('success', 'Tạo đơn hàng thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.list')->with('error', 'Có lỗi khi tạo đơn hàng. Vui lòng thử lại sau!');
        }
    }
    

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;
        return view('donhang.show',compact('donHang','trangThaiDonHang','trangThaiThanhToan'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function generateUniqueOrderCode(){
        do{
            $orderCode = 'ORD-'.'-'. now()->timestamp;
        }while(DonHang::where('ma_don_hang', $orderCode)->exists());
        return $orderCode;
    }
}
