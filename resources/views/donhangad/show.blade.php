@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('contents')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="order-details">
        <h2>Chi tiết đơn hàng</h2>
        <table class="table order-table">
            <tr>
                <th>Mã đơn hàng:</th>
                <td>{{ $donHang->ma_don_hang }}</td>
            </tr>
            <tr>
                <th>Tên người nhận:</th>
                <td>{{ $donHang->ten_nguoi_nhan }}</td>
            </tr>
            <tr>
                <th>Email người nhận:</th>
                <td>{{ $donHang->email_nguoi_nhan }}</td>
            </tr>
            <tr>
                <th>Số điện thoại người nhận:</th>
                <td>{{ $donHang->so_dien_thoai_nguoi_nhan }}</td>
            </tr>
            <tr>
                <th>Địa chỉ người nhận:</th>
                <td>{{ $donHang->dia_chi_nguoi_nhan }}</td>
            </tr>

            <tr>
                <th>Trạng thái đơn hàng:</th>
                <td>{{ $trangThaiDonHang[$donHang->trang_thai_don_hang] ?? 'Chờ xác nhận' }}</td>
            </tr>
            <tr>
                <th>Trạng thái thanh toán:</th>
                <td>{{ $trangThaiThanhToan[$donHang->trang_thai_thanh_toan] ?? 'CHỜ THANH TOÁN' }}</td>
            </tr>
            <tr>
                <th>Tiền hàng:</th>
                <td>{{ number_format($donHang->tien_hang, 0, ',', '.') }} đ</td>
            </tr>
            <tr>
                <th>Tiền ship:</th>
                <td>{{ number_format($donHang->tien_ship, 0, ',', '.') }} đ</td>
            </tr>
            <tr>
                <th>Tổng tiền:</th>
                <td>{{ number_format($donHang->tong_tien, 0, ',', '.') }} đ</td>
            </tr>
        </table>
    </div>

    <div class="product-details">
        <h3>Sản phẩm đã mua</h3>
        <table class="table product-table">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donHang->chiTietDonHang as $item)
                    @php
                        $sanPham = $item->Product;
                    @endphp
                    <tr>
                        <td>
                            <img src="{{ Storage::url($sanPham->image) }}" alt="Product" width="100px">
                        </td>
                        <td>{{ $sanPham->ma_san_pham }}</td>
                        <td>{{ $sanPham->name }}</td>
                        <td>{{ number_format($item->don_gia, 0, ',', '.') }} đ</td>
                        <td>{{ $item->so_luong }}</td>
                        <td>{{ number_format($item->so_luong * $item->don_gia, 0, ',', '.') }} đ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('styles')
<style>
    .order-details, .product-details {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
    }
    .order-details h2, .product-details h3 {
        text-align: center;
        margin-bottom: 20px;
    }
    .order-table, .product-table {
        width: 100%;
        border-collapse: collapse;
    }
    .order-table th, .order-table td, .product-table th, .product-table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }
    .order-table th, .product-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    .alert {
        margin-bottom: 20px;
    }
</style>
@endsection
