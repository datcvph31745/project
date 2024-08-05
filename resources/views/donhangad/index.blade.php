@extends('layouts.app')

@section('title', 'Data product')

@section('contents')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">MÃ ĐƠN HÀNG</th>
            <th scope="col">NGÀY ĐẶT</th>
            <th scope="col">TỔNG TIỀN</th>
            <th scope="col">TRẠNG THÁI</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listDonHang as $item)
        <tr>
            <td>{{ $item->ma_don_hang }}</td>
            <td>{{ $item->created_at->format('d-m-Y') }}</td>
            <td>{{ number_format($item->tong_tien, 0, ',', '.') }} D</td>

            <td>
<form action="{{ route('donhangad.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <select name="trang_thai_don_hang" id="select-{{ $item->id }}" onchange="confirmSubmit(this, '{{ $item->trang_thai_don_hang }}')">
        @foreach ($trangThaiDonHang as $key => $value)
            @php
                // Determine if the option should be disabled
                $disabled = ($item->trang_thai_don_hang === $type_giao_hang_thanh_cong || $item->trang_thai_don_hang === $type_huy_don_hang) && $key !== $item->trang_thai_don_hang ? 'disabled' : '';
            @endphp

            <option value="{{ $key }}" 
                {{ $key == $item->trang_thai_don_hang ? 'selected' : '' }}
                {{ $disabled }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
</form>

                
            </td>
            <td>
                <a href="{{ route('donhangad.show', $item->id) }}" class="btn btn-info btn-sm">Xem</a>
                @if ($item ->trang_thai_don_hang === $type_huy_don_hang || $item ->trang_thai_don_hang === $type_giao_hang_thanh_cong )
                <form action="{{ route('donhangad.destroy', $item->id) }}"
                    method="POST" class="d-inline"
                    onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        Xóa
                    </button>
                </form>
                    
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection

<script>
function confirmSubmit(selectElement, defaultValue) {
    const form = selectElement.form;
    const selectedOption = selectElement.options[selectElement.selectedIndex].text;

    const confirmationMessage = `Bạn có chắc chắn muốn thay đổi trạng thái đơn hàng thành "${selectedOption}" không?`;

    if (confirm(confirmationMessage)) {
        form.submit();
    } else {
        selectElement.value = defaultValue;
    }
}
</script>
