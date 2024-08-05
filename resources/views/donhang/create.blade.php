<link rel="stylesheet" href="../css/home.css">



@extends('flayout.master')

@section('noidung')


<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />


<style>
    .info-content {
      display: none;
    }

    input[type="radio"]:checked + .info-content {
      display: block;
    }
  </style>
 <div class="container">
    <main class="main-content">
      <!--== Start Shopping Checkout Area Wrapper ==-->
      <section class="shopping-checkout-wrap">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <!--== Start Billing Accordion ==-->
              <div class="checkout-billing-details-wrap">
                <h2 class="title">Chi tiết đơn hàng</h2>
                <div class="billing-form-wrap">

                <?php 
                    if (isset($_SESSION['user'])){
                        $name=$_SESSION['user']['user'];
                        $address=$_SESSION['user']['address'];
                        $tel=$_SESSION['user']['tel'];
                        $email=$_SESSION['user']['email'];
                    }
                    else{
                        $name="";
                        $address="";
                        $tel="";
                        $email="";
                    }
                ?>

                  <form action="index.php?act=billconfirm" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="name">Người đặt hàng</label>
                          <input name="name" type="text"  class="form-control" value="<?=$name?>">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="address">Địa chỉ</label>
                          <input name="address" type="text"  class="form-control" value="<?=$address?>">
                        </div>
                      </div>
                      
                        <div class="form-group">
                          <label for="tel">Điện thoại</label>
                          <input name="tel" type="text"  class="form-control" value="<?=$tel?>">
                        </div>
                      
                      <div class="col-md-12">
                        <div class="form-group" data-margin-bottom="30">
                          <label for="email">Email</label>
                          <input name="email" type="text"  class="form-control" value="<?=$email?>">
                        </div>
                      </div>
                </div>
                <h2 class="title">Thanh toán</h2>
                <div>
                <label>
                    <input type="radio" name="pttt" id="pttt1" value="1" checked> Thanh toán khi nhận hàng
                </label><br>
                <label>
                    <input type="radio" name="pttt" id="pttt2" value="0"> Thanh toán chuyển khoản
                    <div class="info-content">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <img src="upload/z5654538899846_ed3d5fc7ad4bc12ec64e8750fe1f26f3.jpg">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <br><br>
                          <label for="f_name">MB Bank</label><br>
                          <label for="f_name">0943772174</label><br>
                          <label for="f_name">NGUYEN VAN VU</label>
                        </div>
                      </div>
                      <div class="col-md-12">
                      <div class="form-group">
                          <label for="com_name">Ngân hàng</label>
                          <input name="bankname" type="text"  class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="com_name">Tên tài khoản</label>
                          <input name="bankuser" type="text"  class="form-control">
                        </div>
                      </div>
                        <div class="form-group">
                          <label for="phone">Số tài khoản</label>
                          <input name="banknum" type="text"  class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group" data-margin-bottom="30">
                          <label for="email">Bill chuyển khoản</label>
                          <input name="bankimage" type="file" class="form-control" placeholder="Image" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                      </div>
                    </div>
                </label>
                </div>
                      <input type="submit" name="dongydathang" value="Đồng ý đặt hàng" class="btn-theme">
                  </form>
              </div>
              <!--== End Billing Accordion ==-->
            </div>
            </div>
            <div class="col-lg-6">
              <!--== Start Order Details Accordion ==-->
              <div class="checkout-order-details-wrap">
                <div class="order-details-table-wrap table-responsive">
                  <h2 class="title mb-25">Chi tiết sản phẩm</h2>
                  <table class="table">
                  <thead>
                      <tr>
                        <th class="product-name">Sản phẩm</th>
                        <th class="product-total">Giá</th>
                      </tr>
                    </thead>
                    <tbody class="table-body">

                    <?php
                    $tong=0;
                    $ttien=0;
                      if (isset($_SESSION["cart"])) {
                      foreach ($_SESSION["cart"] as $item) {
                      extract($item);
                      $tong=$item['price']*$item['soluongmua'];
                      $ttien+=$tong;

                    ?>

                        <tr class="cart-item">
                          <td class="product-name"> <?php echo $item['names']; ?> <span class="product-quantity">x<?php echo $item['soluongmua']; ?></span></td>
                          <td class="product-total"> <?php echo $tong; ?> Vnđ</td>
                        </tr>
                      <?php }?>
                      </tbody>
                      <tfoot class="table-foot">
                        <tr class="cart-subtotal">
                          <th>Tổng</th>
                          <td><?php echo $ttien; ?> Vnđ</td>
                        </tr>
                        <tr class="shipping">
                        <th>Shipping</th>
                        <td>30000 Vnđ</td>
                      </tr>
                      <tr class="order-total">
                      <th>Thành tiền</th>
                      <td><?php echo $ttien+30000; ?> Vnđ</td>
                    </tr>
                  </tfoot>
                  </table>
                <?php } ?>
                </div>
              </div>
              <!--== End Order Details Accordion ==-->
            </div>
          </div>
        </div>
      </section>
      <!--== End Shopping Checkout Area Wrapper ==-->
      <?php
                            if(isset($thongbao)&&($thongbao!="")) echo $thongbao.'<br>'
                       ?> 
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
