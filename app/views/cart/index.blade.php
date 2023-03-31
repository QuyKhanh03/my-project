@extends('layout.displays')
@section('content')
<div class="liton__shoping-cart-area mb-120 mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping-cart-inner">
                    @if(isset($_SESSION["success"]) && isset($_GET["msg"]))

                    <div class="alert alert-success text-center">
                        <strong >{{ $_SESSION["success"] }}</strong> 
                    </div>
                @endif
                    {{-- @php
                        echo "<pre>";
                        echo print_r($_SESSION["carts"]);
                    @endphp --}}
                    @if(isset($_SESSION["carts"]) && count($_SESSION["carts"]) > 0)
                    <div class="shoping-cart-table table-responsive">
                        <h3 style="text-align: center;margin-left: 80%;font-size: 15px"><a href="{{ url('remove-all-cart') }}" >Xóa tất cả giỏ hàng</a></h3>
                        <table class="table ">
                            @php
                                $i = 1;
                                $order_total = 0;
                            @endphp
                            
                            <tbody>
                                
                                @foreach ($_SESSION["carts"] as $key => $value)
                                
                                <tr >
                                    <td>{{ $i++ }}</td>
                                    <td style="width: 270px;" ><img style="width: 80%;" src="{{ url('public/img/product/') }}{{ $value["image"] }}" alt=""></td>
                                    <td style="width: 270px;"><a href="{{ url('product/'.$value["id"]) }}"><strong>{{ $value["name"] }}</strong></a></td>
                                    <td>{{ number_format($value["price"]) }}</td>
                                    <td>
                                        <a href="{{ url('change-quantity?id='.$value["id"]).'&set=minus' }}" style="font-size: 30px"><b>-</b></a>
                                        <input style="border: none;background: #fff;width: 30px; padding-left: 4px; "  disabled name="quantity" type="number" value="{{ $value["quantity"] }}">
                                        <a href="{{ url('change-quantity?id='.$value["id"]).'&set=plus' }}" style="font-size: 25px" ><b>+</b></a>
                                    </td>
                                    <td>{{ number_format($value["total"]) }} <b>VNĐ</b></td>
                                    <td><a href="{{ url('remove-cart/'.$value["id"]) }}">Xóa</a></td>
                                </tr>
                                @php
                                    $order_total += $value["total"];
                                    
                                @endphp
                                @endforeach     
                            </tbody>
                            
                        </table>
                    </div>
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
                                
                            <tr>
                                <td><strong>Tổng đơn hàng</strong></td>
                                <td><strong>{{ number_format($order_total) }}</strong> <b>VNĐ</b></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="btn-wrapper text-right">
                        <a href="{{ url('checkout') }}" class="theme-btn-1 btn btn-effect-1">Thanh toán</a>
                        </div>
                    </div>
                    @else 
                    <div class="alert alert-danger text-center">
                        <strong >Giỏ hàng trống</strong>
                    </div>
                    @endif
                    <a href="{{ url('products') }}" class="theme-btn-1 btn btn-effect-1 mt-3">Tiếp tục mua hàng</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection