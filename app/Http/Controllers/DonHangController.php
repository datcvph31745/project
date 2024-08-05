<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;


class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listDonHang = DonHang::query()->orderByDesc('id')->get();
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $type_huy_don_hang = DonHang::HUY_DON_HANG;
        $type_giao_hang_thanh_cong = DonHang::GIAO_HANG_THANH_CONG;

    
        return view('donhangad.index', compact('listDonHang', 'trangThaiDonHang', 'type_huy_don_hang','type_giao_hang_thanh_cong'));
    }
    



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;
    
        return view('donhangad.show', compact('donHang', 'trangThaiDonHang', 'trangThaiThanhToan'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
{
    $donHang = DonHang::query()->findOrFail($id);
    $currentTrangThai = $donHang->trang_thai_don_hang;
    $newTrangThai = $request->input('trang_thai_don_hang');

    $tangThais = array_keys(DonHang::TRANG_THAI_DON_HANG);

        /// Kiem tra neu donh hang da huy thi khong duoc thay doi
        if ($currentTrangThai === DonHang::HUY_DON_HANG) {
        return redirect()->route('donhangad.index')->with('error', 'Đơn hàng đã bị hủy không thể thay đổi');
    }

            //Kiểm tra nếu tạng thá mới không được nămf sau trang thái hiên tịa
        if (array_search($newTrangThai, $tangThais) < array_search($currentTrangThai, $tangThais)) {
        return redirect()->route('donhangad.index')->with('error', 'Không thể cập nhập ngược lại trạng thái');
    }

    $donHang->trang_thai_don_hang = $newTrangThai;
    $donHang->save();

    return redirect()->route('donhangad.index')->with('success', 'Cập nhập trạng thái thành công');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
    
        if ($donHang && $donHang->trang_thai_don_hang == DonHang::HUY_DON_HANG) {
            $donHang->chiTietDonHang()->delete();
            $donHang->delete();
            return redirect()->back()->with('success', 'Xóa đơn hàng thành công');
        }
    
        return redirect()->back()->with('error', 'Xóa đơn hàng không thành công');
    }
    
}
