@extends('layout.displays')

@section('content')


<div class="ltn__checkout-area mb-105">
    <div class="container">
        @if(isset($_SESSION["errors"])&& isset($_GET["msg"]))
            <div class="alert alert-danger mt-5 " role="alert">
                {{ $_SESSION["errors"] }}
            </div>
            <a href="{{ url('cart') }}" class="btn theme-btn-1 btn-effect-1 text-uppercase">Trở về giỏ hàng</a>
        @endif
        @if(isset($_SESSION["success"])&& isset($_GET["msg"]))
        <div class="alert alert-success mt-5 " role="alert">
            {{ $_SESSION["success"] }}
        </div>
        
        <a href="{{ url("") }}" class="btn theme-btn-1 btn-effect-1 text-uppercase">Trở về trang chủ</a>
        @else
        @if(!isset($_SESSION["auth"]))
        <form action="{{ url('checkoutPost') }}" method="POST">
        <div class="row">
           
            <div class="col-lg-12">
                <div class="ltn__checkout-inner">
                    
                    <div class="ltn__checkout-single-content mt-50">
                        <h4 class="title-2">Thanh Toán</h4>
                        <div class="ltn__checkout-single-content-info">
                            
                                <h6>Thông tin người nhận</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" name="name_user" placeholder="Họ tên">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" name="email" placeholder="Địa chỉ Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input type="text" name="phone" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-lg-12 col-md-12">
                                        <h6>Địa chỉ</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input name="address" type="text" placeholder="địa chỉ nhận hàng">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                {{-- <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Bạn có muốn tạo tài khoản?</label></p> --}}
                                <h6>Ghi chú (nếu có)</h6>
                                <div class="input-item input-item-textarea ltn__custom-icon">
                                    <textarea name="note" placeholder=""></textarea>
                                </div>

                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ltn__checkout-payment-method mt-50">
                    <h4 class="title-2">Hình thức thanh toán</h4>
                    <div id="checkout_accordion_1">
                        <!-- card -->
                        
                        <!-- card -->
                        <div class="card">
                            <h5 class="ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-2" aria-expanded="true"> 
                                Thanh toán khi nhận hàng
                            </h5>
                            <div id="faq-item-2-2" class="collapse show" data-parent="#checkout_accordion_1">
                                <div class="card-body">
                                    <p>Thanh toán bằng tiền mặt khi giao hàng.</p>
                                </div>
                            </div>
                        </div>                          
                       
                    </div>
                    <div class="ltn__payment-note mt-30 mb-30">
                        <br>
                    </div>
                    
                    <a href="{{ url('cart') }}" class="btn theme-btn-1 btn-effect-1 text-uppercase" >Trở lại trang giỏ hàng</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping-cart-total mt-50">
                    <h4>Tổng giỏ hàng</h4>
                    <table class="table">
                        <tbody>
                            @foreach ($_SESSION["carts"] as $key=>$value)
                            <tr>
                                <td>{{ $value["name"] }} <b>x</b> {{ $value["quantity"] }}</td>
                                <td>{{ number_format($value["total"]) }} <b>VNĐ</b></td>
                            </tr>
                            @endforeach
                            @php
                                $order_total = 0;
                                foreach ($_SESSION["carts"] as $key=>$value) {
                                    $order_total += $value["total"];
                                }
                            @endphp
                        <tr>
                            <td><strong>Tổng đơn hàng</strong></td>
                            <td><strong>{{ number_format($order_total) }}</strong> <b>VNĐ</b></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="btn-wrapper text-right">
                        <input type="hidden" name="total_amount" value="{{ $order_total }}">
                    <button name="btn" class="theme-btn-1 btn btn-effect-1">Thanh toán ngay</button>
                    </div>
                </div>
            </div>
            

        </div>
        </form>
        @else
        <form action="{{ url('checkoutPost') }}" method="POST">
        <div class="row">
           
            <div class="col-lg-12">
                <div class="ltn__checkout-inner">
                    
                    <div class="ltn__checkout-single-content mt-50">
                        <h4 class="title-2">Thanh Toán</h4>
                        <div class="ltn__checkout-single-content-info">
                            
                                <h6>Thông tin người nhận</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" name="name_user" placeholder="Họ tên" value="{{ $_SESSION["auth"]->name_user }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" name="email" placeholder="Địa chỉ Email" value="{{ $_SESSION["auth"]->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input type="text" name="phone" placeholder="Số điện thoại" value="{{ $_SESSION["auth"]->phone }}">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                   
                                    <div class="col-lg-12 col-md-12">
                                        <h6>Địa chỉ</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input name="address" type="text" placeholder="địa chỉ nhận hàng" value="{{ $_SESSION["auth"]->address }}">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                {{-- <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Bạn có muốn tạo tài khoản?</label></p> --}}
                                <h6>Ghi chú (nếu có)</h6>
                                <div class="input-item input-item-textarea ltn__custom-icon">
                                    <textarea name="note" placeholder=""></textarea>
                                </div>

                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ltn__checkout-payment-method mt-50">
                    <div class="ltn__payment-note mt-30 mb-30">
                        <br>
                    </div>
                    
                    <a href="{{ url('cart') }}" class="btn theme-btn-1 btn-effect-1 text-uppercase" >Trở lại trang giỏ hàng</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping-cart-total mt-50">
                    <h4>Tổng giỏ hàng</h4>
                    <table class="table">
                        <tbody>
                            @foreach ($_SESSION["carts"] as $key=>$value)
                            <tr>
                                <td>{{ $value["name"] }} <b>x</b> {{ $value["quantity"] }}</td>
                                <td>{{ number_format($value["total"]) }} <b>VNĐ</b></td>
                            </tr>
                            @endforeach
                            @php
                                $order_total = 0;
                                foreach ($_SESSION["carts"] as $key=>$value) {
                                    $order_total += $value["total"];
                                }
                            @endphp
                        <tr>
                            <td><strong>Tổng đơn hàng</strong></td>
                            <td><strong>{{ number_format($order_total) }}</strong> <b>VNĐ</b></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="btn-wrapper text-right">
                        <input type="hidden" name="total_amount" value="{{ $order_total }}">
                    <button name="btn" class="theme-btn-1 btn btn-effect-1">Thanh toán ngay</button>
                    </div>
                </div>
            </div>
            

        </div>
        </form>
        @endif
        @endif
    </div>
</div>
@endsection