<style>
    .order-form-container {
    max-width: 1200px; /* Increased width to accommodate side-by-side layout */
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    display: flex;
    justify-content: space-between; /* Align items to be side-by-side */
    gap: 20px; /* Add space between form and order summary */
}

.order-form {
    flex: 1; /* Take up remaining space */
}

.order-summary {
    flex: 0 0 300px; /* Fixed width for the order summary */
    border-left: 1px solid #ddd; /* Border between form and summary */
    padding-left: 20px;
}

.order-summary h3 {
    margin-bottom: 15px;
}

.order-items {
    margin-bottom: 15px;
}

.order-item {
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}

.order-totals p {
    margin: 5px 0;
    font-weight: bold;
}
/* Style for form inputs */
.order-form input[type="text"],
.order-form input[type="tel"],
.order-form input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box; /* Ensures padding and border are included in the width */
    margin-bottom: 10px;
}

.order-form input[type="text"]:focus,
.order-form input[type="tel"]:focus,
.order-form input[type="email"]:focus {
    border-color: #007bff; /* Highlight border color on focus */
    outline: none; /* Remove default outline */
}

/* Style for the submit button */
.btn-submit {
    background-color: #007bff; /* Primary color */
    color: #fff; /* Text color */
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #0056b3; /* Darker shade on hover */
}
.order-form-container{
    margin-top: 200px;
}
/* Style for <hr> elements in order summary */
.order-totals hr {
    border: 0; /* Remove default border */
    border-top: 1px solid #ddd; /* Add a top border */
    margin: 10px 0; /* Add spacing above and below the line */
}

/* Optional: Add spacing between the totals and the button */
.order-totals button.btn-submit {
    margin-top: 20px; /* Add spacing above the button */
}
/* Container for order totals */
.order-totals {
    display: flex;
    flex-direction: column;
    gap: 10px; /* Space between items */
}

.order-totals-table {
    width: 100%; /* Make table span full width */
    border-collapse: collapse; /* Remove space between borders */
}

.order-totals-table th,
.order-totals-table td {
    padding: 8px; /* Add padding to table cells */
    border-bottom: 1px solid #ddd; /* Add border below each row */
}

.order-totals-table th {
    background-color: #f4f4f4; /* Background color for headers */
    font-weight: bold; /* Make header text bold */
    text-align: left; /* Align header text to the left */
}

.order-totals-label {
    font-weight: normal; /* Ensure labels are not bold */
}

.order-totals-value {
    text-align: right; /* Align values to the right */
}

/* Style for <hr> elements in order totals */
.order-totals hr {
    border: 0; /* Remove default border */
    border-top: 1px solid #ddd; /* Add a top border */
    margin: 10px 0; /* Add spacing above and below the line */
}

/* Style for the submit button */
.btn-submit {
    background-color: #007bff; /* Primary color */
    color: #fff; /* Text color */
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #0056b3; /* Darker shade on hover */
}



</style>
@extends('flayout.master')

@section('noidung')
<div class="order-form-container">
    <div class="order-form">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên người đặt hàng:</label>
                <input type="text" id="name" name="ten_nguoi_nhan" required>
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" required>
            </div>

            <div class="form-group">
                <label for="phone">Điện thoại:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

        </form>
    </div>

    <div class="order-summary">
        <h3>Chi tiết đơn hàng</h3>
        <div class="order-items">
            <!-- Render danh sách sản phẩm và thông tin shipping -->
            {{-- @foreach ($orderItems as $item)
                <div class="order-item">
                    <p>{{ $item->name }} - {{ $item->quantity }} x {{ $item->price }}</p>
                </div>
            @endforeach --}}
        </div>
        <div class="order-totals">
            <table class="order-totals-table">
                <thead>
                    <tr>
                        <th class="order-totals-header">Sản phẩm</th>
                        <th class="order-totals-header">Số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $key => $item)
                        <tr>
                            <td>
                                <a href="{{route('product.detail',$key)}}">
                                    {{$item['name']}} <strong> x
                                        {{$item['so_luong']}}
                                    </strong>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="order-totals-label">Tổng tiền:</td>
                        <td class="order-totals-value">30.000</td>
                    </tr>
                    <tr>
                        <td class="order-totals-label">Shipping:</td>
                        <td class="order-totals-value">788</td>
                    </tr>
                    <tr>
                        <td class="order-totals-label">Thành tiền:</td>
                        <td class="order-totals-value">888</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <button type="submit" class="btn-submit">Đặt hàng</button>
        </div>
        
    </div>
</div>
@endsection
