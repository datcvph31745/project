<style>
  .button-container {
      display: flex;
      justify-content: flex-end; 
  }

  #update-cart {
      text-align: right;
      margin-left: 1100px;
      margin-top: 20px; 
      border: 2px solid transparent; 
      padding: 10px 20px;
      background-color: #f0f0f0;
      transition: border-color 0.3s ease, background-color 0.3s ease; 
  }

  #update-cart:hover {
      border-color: #007bff;
      background-color: #e0e0e0; 
  }
</style>


@extends('flayout.master')
@section('noidung')
    <!---- home page section -------->
    <section id="page-header" class="about-header">
        <h2>Giỏ hàng</h2>
      </section>
  
      <section id="cart" class="section-p1">
        <table width="100%">

          <form action="{{route('cart.update')}}" method="post">
            @csrf

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
                <td>
                  <img src="{{ Storage::url($item['image']) }}" alt="" />
                  <input type="hidden" name="cart[{{$key}}][image]" value="{{$item['image']}}">
                </td>
                <td><a href="{{ route('product.detail', $key) }}">{{ $item['name'] }}
                  </a>
                  <input type="hidden" name="cart[{{$key}}][name]" value="{{$item['name']}}">
  
                </td>
                <td>{{ number_format($item['gia'], 0, ',', '.') }} đ
                  <input type="hidden" name="cart[{{$key}}][gia]" value="{{$item['gia']}}">
  
                </td>
                <td>
                  <input 
                    type="number" 
                    value="{{ $item['so_luong'] }}" 
                    class="quantity-input" 
                    data-key="{{ $key }}" 
                    data-price="{{ $item['gia'] }}" 
                    name="cart[{{$key}}][so_luong]"
                    min="1" 
                  />
  
  
                </td>
                <td class="total-price" id="total-price-{{ $key }}">
                  {{ number_format($item['gia'] * $item['so_luong'], 0, ',', '.') }} đ
                </td>
              </tr>
              @endforeach
            </tbody>
       
        </table>
        <button type="submit" class="normal" id="update-cart">Cập nhật giỏ hàng</button>

    


      </form>

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
              <td class="sub-subTotal">{{ number_format($subTotal, 0, ',', '.') }} đ</td>
            </tr>
            <tr>
              <td>Vận chuyển:</td>
              <td class="sub-shipping">{{ number_format($shipping, 0, ',', '.') }} đ</td>
            </tr>
            <tr>
                              <td><strong>Tiền thanh toán:</strong></td>
              
              <td class="sub-total"><strong>{{ number_format($total, 0, ',', '.') }} đ</strong></td>
            </tr>
          </table>


          <a href="{{route('donhangs.create')}}">

          <button class="normal">Tiến hành thanh toán</button>
       </a>
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
  
                  updateTotal();
              });
          });
  
          const deleteIcons = document.querySelectorAll('.delete-icon');
  
          deleteIcons.forEach(icon => {
              icon.addEventListener('click', function() {
                  const confirmDelete = confirm("Bạn có chắc chắn muốn xóa hàng này?");
                  if (confirmDelete) {
                      const row = this.closest('tr');
                      if (row) {
                          row.remove();
                          updateTotal();
                      }
                  }
              });
          });
  
      });
  </script>
  
    
    
  