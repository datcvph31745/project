@extends('flayout.master')
@section('noidung')

<section id="page-header">
    <h2>Trang sản phẩm</h2>
    <p>Save more with coupons & up to 70% off!</p>
</section>

<section id="product1" class="section-p1">
    <div class="danhmuc">
        <div class="title">Danh Mục Sản Phẩm</div>
        <ul>
            @foreach ($dmsp as $item)
                <li><a href="{{ route('sanphamtheodanhmuc', $item->slug) }}">{{ mb_strtoupper($item->name) }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="pro-container">
        @foreach ($sanpham as $product)
            <div class="pro">
                <a href="{{ route('product.detail', $product->id) }}">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" />
                </a>
                <div class="des">
                    <span>{{ $product->brand }}</span>
                    <h5>{{ $product->name }}</h5>
                    <div class="star">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fas fa-star{{ $product->rating > $i ? '' : '-o' }}"></i>
                        @endfor
                    </div>
                    <h4>{{ number_format($product->gia, 0, ',', '.') }}</h4>
                </div>
                <a href="#"><i class="fa fa-shopping-cart cart"></i></a>
            </div>
        @endforeach
    </div>
</section>

<section id="pagination" class="section-p1">
  <div class="pagination">
      {{ $sanpham->appends(request()->query())->links() }}
  </div>
</section>


<!---- newsletter section start -->
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
