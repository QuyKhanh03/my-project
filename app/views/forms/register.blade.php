@extends('layout.displays')
@section('content')
<div class="ltn__login-area pb-110 mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Đăng Ký <br>Tài Khoản Của Bạn</h1>
                    {{-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                         Sit aliquid,  Non distinctio vel iste.</p> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form id="myForm" action="{{ url('register') }}" method="POST" class="ltn__form-box contact-form-box">
                        <div class="mb-2">
                            {{-- họ tên --}}
                            <input  style="height: 50px; margin: 0;" type="text" name="name_user" placeholder="Họ Tên">
                            @if(isset($_SESSION["errors"]) && isset($_GET["msg"]))
                                <p style="color: red;margin: 0;">{{ $_SESSION["errors"]["name_user"] }}</p>
                                <p style="color: red;margin: 0;">{{ $_SESSION["errors"]["name_user_2"] }}</p>
                            @endif
                        </div>
                        {{-- email --}}
                        <div class="mb-3">
                            <input style="height: 50px; margin: 0;" type="text" name="email" placeholder="Email*">
                            @if(isset($_SESSION["errors"]) && isset($_GET["msg"]))
                                <p style="color: red;margin: 0;">{{ $_SESSION["errors"]["email"] }}</p>
                                <p style="color: red;margin: 0;">{{ $_SESSION["errors"]["email_check"] }}</p>
                                <p style="color: red;margin: 0;">{{ $_SESSION["errors"]["email_check_2"] }}</p>
                            @endif
                        </div>
                        {{-- password --}}  
                        <div class="mb-3">
                            <input style="height: 50px; margin: 0;" type="password" name="password" placeholder="Mật Khẩu*">
                            @if(isset($_SESSION["errors"]) && isset($_GET["msg"]))
                                <p style="color: red;margin: 0;">{{ $_SESSION["errors"]["password"] }}</p>
                            @endif
                        </div>
                        {{-- confirm password --}}
                        <div class="mb-3">
                            <input style="height: 50px; margin: 0;" type="password" name="confirmpassword" placeholder="Nhập Lại Mật Khẩu*">
                            @if(isset($_SESSION["errors"]) && isset($_GET["msg"]))
                                <p style="color: red;margin: 0;">{{ $_SESSION["errors"]["confirmpassword"] }}</p>
                                <p style="color: red;margin: 0;">{{ $_SESSION["errors"]["confirm"] }}</p>
                            @endif
                        </div>
                        <input type="hidden" name="role_id" value="2">
                        <div class="btn-wrapper">
                            <button name="btn" class="theme-btn-1 btn reverse-color btn-block" type="submit">Đăng Ký</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection