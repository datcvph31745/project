@component('mail::message')
    # Xác nhận đơn hàng

    Xin chào {{ $donHang->ten_nguoi_nhan }},

    Cảm ơn bạn đã đặt hàng từ cửa hàng chúng tôi. Đây là thông tin đơn hàng của bạn:

    **Mã đơn hàng:** {{ $donHang->ma_don_hang }}

    **Sản phẩm đã đặt:**
    @foreach ($donHang->ChiTienDonHang as $chiTiet)
        - {{ $chiTiet->product->ten_san_pham }} x {{ $chiTiet->so_luong }}: {{ number_format($chiTiet->thanh_tien, 0, ',', '.') }} VND
    @endforeach

    **Tổng tiền:** {{ number_format($donHang->tong_tien, 0, ',', '.') }} VND

    Chúng tôi sẽ liên hệ với bạn sớm nhất.

    Cảm ơn đã mua hàng.

    Trân trọng,
@endcomponent
