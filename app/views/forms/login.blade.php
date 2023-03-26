@extends('layout.displays')
@section('content')
    <!-- LOGIN AREA START -->
    <div class="ltn__login-area pb-65 mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Đăng Nhập <br>Vào Tài Khoản Của Bạn</h1>
                        @if(isset($_SESSION["success"]) && isset($_GET["msg"]))

                            <div class="alert alert-success">
                                <strong>{{ $_SESSION["success"] }}</strong> 
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 container">
                    <div class="account-login-inner">
                        <form action="{{ url('login-post') }}" class="ltn__form-box contact-form-box" method="POST">
                            <input type="text" name="email" placeholder="Email*">
                            @if(isset($_SESSION["errors"]) && isset($_GET["msg"]))
                                <p style="color: red; margin: 0;">{{ $_SESSION["errors"]["email"] }}</p>
                            @endif
                            <input type="password" name="password" placeholder="Mật Khẩu*">
                            @if(isset($_SESSION["errors"]) && isset($_GET["msg"]))
                                <p style="color: red; margin: 0;">{{ $_SESSION["errors"]["password"] }}</p>
                            @endif
                            <div class="btn-wrapper mt-0">
                                @if(isset($_SESSION["errors"]) && isset($_GET["msg"]))
                                    <p style="color: red; margin: 0;">{{ $_SESSION["errors"] }}</p>
                                @endif


                                <button name="btn" class="theme-btn-1 btn btn-block" type="submit">Đăng Nhập</button>
                            </div>
                            <div class="go-to-btn mt-20">
                                <a href="#"><small>Quên Mật Khẩu ?</small></a> 
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-create text-center pt-50">
                        <h4>Bạn Chưa Có Tài Khoản ?</h4>
                        <p class="mt-3 py-4">Thêm các mục vào danh sách mong muốn của bạn nhận các đề xuất được cá nhân hóa

                            kiểm tra nhanh hơn theo dõi đơn đặt hàng của bạn đăng ký</p>
                        <div class="btn-wrapper">
                            <a href="{{ url('register') }}" class="theme-btn-1 btn black-btn">Tạo Tài Khoản</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->
@endsection