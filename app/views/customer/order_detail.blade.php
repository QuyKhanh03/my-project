@extends('layout.displays')
@section('content')
    {{-- @php
        echo "<pre>";
        echo print_r($order_detail);
    @endphp --}}
    <div class="liton__wishlist-area pb-70 mt-5 pt-5">
        <div class="container">
            <a href="{{ url('') }}" class="theme-btn-1 btn btn-effect-1">Trở về trang chủ</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center">Chi tiết đơn hàng</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Hình ảnh</th>
                                <th>tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($order_detail as $value)
                            
                            <tr>
                                <td>{{ $value->name_product }}</td>
                                <td>{{ number_format($value->price_product) }} <b>VNĐ</b></td>
                                <td>{{ $value->quantity }}</td>
                                <td>
                                    <img src="{{ url('public/img/product/'.$value->image) }}" alt="" width="100px">
                                </td>
                                <td>
                                    {{ number_format($value->price_product * $value->quantity) }} <b>VNĐ</b>
                                </td>
                            </tr>
                                @php
                                    $total += ($value->price_product * $value->quantity);
                                @endphp
                            @endforeach
                            <tr>
                                <td  class="text-right"><b>Tổng tiền</b></td>
                                <td></td>
                                
                                <td></td>
                                <td></td>
                                <td>
                                    {{ number_format($total) }} <b>VNĐ</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection