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
  
          <div class="small-img-group">
            <div class="small-img-col">
              <img
                src="{{ asset('img/products/f1.jpg') }}"
                class="small-img"
                width="100%"
                alt=""
              />
            </div>
            <div class="small-img-col">
              <img
                src="{{ asset('img/products/f3.jpg') }}"
                class="small-img"
                width="100%"
                alt=""
              />
            </div>
            <div class="small-img-col">
              <img
                src="{{ asset('img/products/f4.jpg') }}"
                class="small-img"
                width="100%"
                alt=""
              />
            </div>
            <div class="small-img-col">
              <img
                src="{{ asset('img/products/f2.jpg') }}"
                class="small-img"
                width="100%"
                alt=""
              />
            </div>
          </div>
        </div>
  
        <div class="single-product-details">
          <h6>Home / T-Shirt</h6>
          <h4>{{$sanPham->name}}</h4>
          <h2>{{number_format($sanPham->gia,0,'','.')}}</h2>
          <select name="" id="">
            <option value="">Select Size</option>
            <option value="">XXL</option>
            <option value="">XL</option>
            <option value="">Medium</option>
            <option value="">Small</option>
          </select>

          <form action="{{route('cart.add')}}" method="post">
            @csrf
            <div class="pro-qty">
              <input type="number" value="1" name="quantity" min="1" id="quantyityInput"  />
              <input type="hidden" name="product_id" value="{{$sanPham->id}}">
              <button type="submit">Thêm vào giỏ hàng</button>
  
            </div>
          </form>

          <h4>Mô tả ngắn</h4>
          <span>
            {{$sanPham->mo_ta}}
          </span>
        </div>
      </section>
  
      <!---- sản phẩm liên quan -------->
      <section id="product1" class="section-p1">
        <h2>Các sản phẩm liên quan</h2>
        <!-- <p>Summer Collection New Mordern Design</p> -->
        <div class="pro-container">
            @foreach ($listSanPham as $item)
                <div class="pro">
                    <img src="{{ Storage::url($item->image) }}" alt="" />
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
                        <h4>{{number_format($item->gia,0,'','.')}}</h4>
                    </div>
                    <form action="{{route('cart.add')}}" method="POST">
                    @csrf
                      <input type="hidden" name="quantity" id="" value="1">
                      <input type="hidden" name="product_id" id="" value="{{$item->id}}">
                      <button><i class="fa fa-shopping-cart cart"></i></button>

                    </form>
                </div>
            @endforeach
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
{{-- <script>
    $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
    $('.pro-qty').appen('<span class="inc qtybtn">+</span>');
    $('qtybtn').on('click',function(){
      var $button = $(this);
      var $input = $button.parent().find('input');
      var oldValue = parseFloat($input.val());

      if($button.hasClass('inc')){
        var newVal = oldValue +1;
      }else{
        if(oldValue>1){
          var newVal = oldValue -1;

        }else{
          var newVal = 1;

        }
      }
 
    
    });

</script> --}}

