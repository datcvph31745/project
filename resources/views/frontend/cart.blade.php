@extends('flayout.master')
@section('noidung')
    <!---- home page section -------->
    <section id="page-header" class="about-header">
        <h2>Giỏ hàng</h2>
      </section>
  
      <section id="cart" class="section-p1">
        <table width="100%">
          <thead>
            <tr>
              <th>Xóa</th>
              <th>Ảnh</th>
              <th>Sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cart as $key => $item)
            <tr>
              <td><i class="fa fa-times-circle delete-icon"></i></td>
              <td><img src="{{ Storage::url($item['image']) }}" alt="" /></td>
                <td><a href="{{ route('product.detail', $key) }}">{{ $item['name'] }}</a></td>
                <td>{{ number_format($item['gia'], 0, ',', '.') }} đ</td>
                <td><input type="number" value="{{ $item['so_luong'] }}" class="quantity-input" data-key="{{ $key }}" data-price="{{ $item['gia'] }}" min="1" /></td>
                <td class="total-price" id="total-price-{{ $key }}">{{ number_format($item['gia'] * $item['so_luong'], 0, ',', '.') }} đ</td>
            </tr>
            @endforeach
            
            




          </tbody>
        </table>
      </section>
  
      <section id="cart-add" class="section-p1">
        <div id="coupon">
          <h3>Mã giảm giá</h3>
          <div>
            <input type="text" placeholder="Nhập mã giảm giá" />
            <button class="normal">Áp dụng</button>
          </div>
        </div>
  
        <div id="subtotal">
          <h3>Cart Totals</h3>
          <table>
            <tr>
              <td>Tổng tiền:</td>
              <td class="subtotal">{{  number_format($subTotal, 0, ',', '.') }}</td>
            </tr>
            <tr>
              <td>Vận chuyển:</td>
              <td>{{  number_format($shipping, 0, ',', '.') }}</td>
            </tr>
            <tr>
              <td><strong>Tiền thanh toán:</strong></td>
              <td><strong>{{  number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
          </table>
  
          <button class="normal">Tiến hành thanh toán</button>
        </div>
      </section>
      <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
          <h4>Sign Up For Newsletters</h4>
          <p>
            Get Email updates about our latest shop and
            <span>special offers.</span>
          </p>
        </div>
        <div class="form">
          <input type="text" placeholder="Your email address" />
          <button class="normal">Sign Up</button>
        </div>
      </section>
    @endsection

    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          const quantityInputs = document.querySelectorAll('.quantity-input');
  
          quantityInputs.forEach(input => {
              input.addEventListener('change', function() {
                  let quantity = parseInt(this.value);
                  if (quantity < 1) {
                      this.value = 1;
                      quantity = 1;
                  }
  
                  const price = parseFloat(this.getAttribute('data-price'));
                  const key = this.getAttribute('data-key');
                  const totalPriceElement = document.getElementById('total-price-' + key);
                  
                  const newTotal = quantity * price;
                  totalPriceElement.textContent = newTotal.toLocaleString('vi-VN') + ' đ';
              });
          });
      });



    // Chờ đến khi tài liệu được tải hoàn toàn
    document.addEventListener("DOMContentLoaded", function() {
        // Tìm tất cả các phần tử có lớp 'delete-icon'
        var deleteIcons = document.querySelectorAll('.delete-icon');

        // Lặp qua từng phần tử và thêm sự kiện nhấp chuột
        deleteIcons.forEach(function(icon) {
            icon.addEventListener('click', function() {
                // Hiển thị hộp thoại xác nhận
                var confirmDelete = confirm("Bạn có chắc chắn muốn xóa hàng này?");
                if (confirmDelete) {
                    // Tìm hàng cha của biểu tượng 'x' và xóa nó
                    var row = this.closest('tr');
                    if (row) {
                        row.parentNode.removeChild(row);
                    }
                }
            });
        });
    });


    
  </script>
  