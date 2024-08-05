<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\DonHang;
use Illuminate\Support\Str;
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
        $validated = $request->validate([
            'ten_nguoi_nhan' => 'required|string|max:255',
            'dia_chi_nguoi_nhan' => 'required|string|max:255',
            'so_dien_thoai_nguoi_nhan' => 'required|string|max:20',
            'email_nguoi_nhan' => 'required|email|max:255',
            'tien_hang' => 'required|numeric',
            'tien_ship' => 'required|numeric',
            'tong_tien' => 'required|numeric',
        ]);
    
        // Generate a unique order number
        $orderNumber = 'DH-' . strtoupper(Str::random(8));
    
        try {
            // Create a new order
            $donHang = DonHang::create(array_merge($validated, ['ma_don_hang' => $orderNumber]));
    
            // Gửi email khi đặt hàng thành công
            Mail::to($donHang->email_nguoi_nhan)->queue(new OrderComfirm($donHang));
    
            return redirect()->route('donhangs.index')->with('success', 'Đơn hàng đã được đặt với mã số: ' . $orderNumber);
        } catch (QueryException $e) {
            // Log the error if needed
            \Log::error('Order creation failed: ' . $e->getMessage());
    
            return redirect()->back()->with('error', 'Có lỗi xảy ra trong quá trình đặt hàng. Vui lòng thử lại sau.');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
