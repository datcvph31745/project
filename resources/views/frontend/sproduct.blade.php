<style>
  .section-p1 {
    padding: 2rem 0;
}

.pro-container {
    display: flex;
    justify-content: center; /* Centers items horizontally */
    flex-wrap: wrap; /* Allows wrapping to the next line */
    gap: 1rem; /* Space between items */
}

.pro {
    flex: 1 1 calc(25% - 1rem); /* Adjust width to fit 4 items per row with gap */
    box-sizing: border-box;
    text-align: center;
    margin: 0.5rem; /* Add margin around each product */
}

.pro img {
    max-width: 100%;
    height: auto;
}

</style>
@extends('flayout.master')
@section('noidung')

    <!---- home page section -------->
    <section id="page-header">
        <h2>Trang sản phẩm</h2>
        <p>Save more with coupons & up to 70% off!</p>
      </section>
  
      <section id="prodetails" class="section-p1">
        <div class="single-product-image">
          <img src="{{ Storage::url($sanPham->image) }}" alt="" width="100%" id="mainImg" />
  
          
        </div>
  
        <div class="single-product-details">
          <h6>Home / T-Shirt</h6>
          <h4> {{$sanPham->name}}</h4>
          <h2> {{number_format($sanPham->gia,0,'','.')}}</h2>
          <h4>Số lượng: {{$sanPham->so_luong}}</h4>

          


          <form action="{{route('cart.add')}}" method="post">
            @csrf
            <div class="pro-qty">
              <input type="number" value="1" name="quantity" min="1" max= "{{$sanPham->so_luong}}"id="quantyityInput"  />
              <input type="hidden" name="product_id" value="{{$sanPham->id}}">
              <button type="submit" onclick="confirmAddToCart(event)">Thêm vào giỏ hàng</button>
  
            </div>
          </form>

          <h4>Mô tả ngắn</h4>
          <span>
            {{$sanPham->mo_ta}}
          </span>
        </div>
      </section>
  
      <!---- sản phẩm liên quan -------->
      <h2 style="text-align: center">Các sản phẩm liên quan</h2>

      <section id="product1" class="section-p1">
        <div class="pro-container">
            @foreach ($listSanPham->take(4) as $item)
            <div class="pro">
                <a href="{{ route('product.detail', $item->id) }}"> 
                  <img src="{{ Storage::url($item->image) }}" alt="" />
                </a>
                <div class="des">
                    <span>{{ $item->brand }}</span>
                    <h5>{{ $item->name }}</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>{{ number_format($item->gia, 0, '.', '.') }}</h4>
                </div>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <button  ><i class="fa fa-shopping-cart cart"></i></button>
                  </form>
            </div>
            @endforeach
        </div>
    </section>
    
      
        </div>
    </section>
    

      </section>
      <!---- newletter section start -->
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
  function confirmAddToCart(event) {
      event.preventDefault(); // Ngăn chặn form gửi đi ngay lập tức
      if (confirm("Bạn có chắc chắn muốn thêm sản phẩm này vào giỏ hàng không?")) {
          event.target.form.submit();
      }
  }


</script>

