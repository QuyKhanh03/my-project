@extends('layout.displays')
@section('content')
<div class="liton__wishlist-area pb-70 mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- PRODUCT TAB AREA START -->
                <div class="ltn__product-tab-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="ltn__tab-menu-list mb-50">
                                    <div class="nav">
                                        <a class="active show" data-toggle="tab" href="#liton_tab_1_1">Bảng điều khiển <i class="fas fa-home"></i></a>
                                        <a data-toggle="tab" href="#liton_tab_1_2">Đơn Hàng <i class="fas fa-file-alt"></i></a>
                                        
                                        <a data-toggle="tab" href="#liton_tab_1_4">Địa Chỉ <i class="fas fa-map-marker-alt"></i></a>
                                        <a data-toggle="tab" href="#liton_tab_1_5">Quyền Riêng Tư <i class="fas fa-user"></i></a>
                                        <a href="{{ url('logout') }}">Đăng xuất <i class="fas fa-sign-out-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="liton_tab_1_1">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <p>Xin Chào  <strong>{{ $auth->name_user }}</strong> (không phải <strong>{{ $auth->name_user }}</strong>? <small><a href="{{ url('logout') }}">Đăng xuất</a></small> )</p>
                                            <p>Từ bảng điều khiển tài khoản của mình, bạn có thể xem các đơn đặt hàng gần đây, quản lý địa chỉ giao hàng và thanh toán, đồng thời chỉnh sửa mật khẩu và chi tiết tài khoản của mình.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_2">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Ngày đặt</th>
                                                            <th>Trạng thái</th>
                                                            <th>Tổng tiền</th>
                                                            <th>Hành động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $key => $value)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ date("d/m/Y",strtotime($value->date_order)) }}</td>
                                                            <td>
                                                                @if($value->status==0)
                                                                <span class="badge badge-warning">Đang chờ xử lý</span>
                                                                @elseif($value->status==1)
                                                                <span class="badge badge-info">Đang giao hàng</span>
                                                                @elseif($value->status==2)
                                                                <span class="badge badge-success">Đã nhận</span>
                                                                @else
                                                                <span class="badge badge-danger">Đã hủy</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $value->total_amount }}</td>
                                                            <td><a href="">Xem</a></td>
                                                        </tr>
                                                        @endforeach  
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="liton_tab_1_4">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <p>Theo mặc định, các địa chỉ sau sẽ được sử dụng trên trang thanh toán.</p>
                                            <div class="row">
                                               
                                                @if(($auth->address == null) && ($auth->phone == null))

                                                <div class="col-md-6 col-12 learts-mb-30">
                                                    <h4>Bạn cần thêm địa chỉ giao hàng</h4>
                                                </div>  
                                                @else
                                                <div class="col-md-6 col-12 learts-mb-30">
                                                    <h4>Địa chỉ giao hàng <small></small></h4>
                                                    <address>
                                                        
                                                        <p>{{ $auth->address }}</p>
                                                        <p>Số điện thoại: {{ $auth->phone }}</p>
                                                    </address>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_5">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <p>Theo mặc định, các địa chỉ sau sẽ được sử dụng trên trang thanh toán.</p>
                                            <div class="ltn__form-box">
                                                <form action="{{ url('updateInfo') }}" method="POST" enctype="multipart/form-data">
                                                    <div class="row mb-50">
                                                        <div class="col-md-6">
                                                            <label>Họ Tên:</label>
                                                            <input type="text" name="name_user" value="{{ $auth->name_user }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label> Email:</label>
                                                            <input type="email" name="email" value="{{ $auth->email }}" placeholder="example@example.com">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label> Số Điện Thoại:</label>
                                                            <input type="text" name="phone" value="{{ $auth->phone ? $auth->phone : "" }}" placeholder="Bạn chưa cập nhật số điện thoại">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label> Địa Chỉ:</label>
                                                            <input type="text" name="address" value="{{ $auth->address ? $auth->address : "" }}" placeholder="Địa chỉ nhận hàng">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label> Ảnh đại diện:</label>
                                                            <input type="file" name="avatar" >
                                                        </div>
                                                        @if(isset($auth->avatar) && ($auth->avatar != null))
                                                        <div class="col-md-6">
                                                            <label> Ảnh đại diện:</label>
                                                            <div class="ltn__commenter-img">
                                                                <img   src="{{ url('public/img/testimonial/') }}{{ $auth->avatar }}" alt="">
                                                                <input type="hidden" name="avatar_old" value="{{ $auth->avatar }}">
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="col-md-6">
                                                            <label> Bạn chưa có ảnh đại diện:</label>
                                                            <h3><i class="icon-user"></i></h3>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <fieldset>
                                                        <legend>Đổi Mật Khẩu</legend>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Mật khẩu mới :</label>
                                                                <input type="password" name="password_new" >
                                                                <label>Nhập lại mật khẩu mới :</label>
                                                                <input type="password" name="rePass">
                                                            </div>
                                                            @if(isset($_SESSION["errors"]) && isset($_GET["msg"])) 
                                                            <p style="color:red">{{ $_SESSION["errors"] }}</p>
                                                            @endif
                                                        </div>
                                                    </fieldset>
                                                    <div class="btn-wrapper">
                                                        <button type="submit" name="btn" class="btn theme-btn-1 btn-effect-1 text-uppercase">Lưu Thay Đổi</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT TAB AREA END -->
            </div>
        </div>
    </div>
</div>
@endsection