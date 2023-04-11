<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx">
<!--<![endif]-->
<!-- Begin Head -->


<!-- Mirrored from kamleshyadav.com/html/splashdash/HTML/bootstrep-5/splashdash-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Nov 2022 09:36:53 GMT -->
<head>
    <title>SplashDash</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    <!--Start Style -->
    @include('templates.styleCss')
</head>

<body>
	<div class="loader">
	  <div class="spinner">
		<img src="{{ router('public/assets/images/loader.gif') }}" alt=""/>
	  </div> 
	</div>
    <!-- Main Body -->
    <div class="page-wrapper">
        <!-- Header Start -->
        <header class="header-wrapper main-header">
            <div class="header-inner-wrapper">
                <div class="header-right">
                    <div class="serch-wrapper">
                        <form>
                            <input type="text" placeholder="Search Here...">
                        </form>
                        <a class="search-close" href="javascript:void(0);"><span class="icofont-close-line"></span></a>
                    </div>
                    <div class="header-left">
                        <div class="header-links">
                            <a href="javascript:void(0);" class="toggle-btn">
                                <span></span>
                            </a>
                        </div>
                        <div class="header-links search-link">
                            <a class="search-toggle" href="javascript:void(0);">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
                                    s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
                                    c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
                                    s-17-7.626-17-17S14.61,6,23.984,6z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="header-controls">
                        

                        
                        <div class="user-info-wrapper header-links">
                            <a href="javascript:void(0);" class="user-info">
                                <img src="{{ router('public/assets/images/user.jpg') }}" alt="" class="user-img">
                                <div class="blink-animation">
                                    <span class="blink-circle"></span>
                                    <span class="main-circle"></span>
                                </div>
                            </a>
                            <div class="user-info-box">
                                <div class="drop-down-header">
                                    <h4>{{ $_SESSION["admin"]->name_user }}</h4>
                                    
                                </div>
                                <ul>
                                    <li>
                                        <a href="profile.html">
                                            <i class="far fa-edit"></i> Edit Profile
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="setting.html">
                                            <i class="fas fa-cog"></i> Settings
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ router('logout') }}">
                                            <i class="fas fa-sign-out-alt"></i> logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Sidebar Start -->
        <aside class="sidebar-wrapper">
			<div class="logo-wrapper">
				<a href="{{ router('') }}" class="admin-logo">
					<img src="{{ router('public/assets/images/logo.png') }}" alt="" class="sp_logo">
					<img src="{{ router('public/assets/images/mini_logo.png') }}" alt="" class="sp_mini_logo">
				</a>
			</div>
            <div class="side-menu-wrap">
                <ul class="main-menu">
                    <li>
                        <a href="{{ router('') }}" class="active">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            </span>
                            <span class="menu-text">
                                Quản Trị
                            </span>
                        </a>
                        {{-- <ul class="sub-menu">
                            <li>
                                <a href="index.html">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Admin
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="user.html">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        User
                                    </span>
                                </a>
                            </li>
                        </ul> --}}
                    </li>
                    
                    <li>
                        <a href="{{ router('products') }}">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            </span>
                            <span class="menu-text">
                                Sản Phẩm
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ router('categories') }}">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            </span>
                            <span class="menu-text">
                                Danh mục sản phẩm
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ router('orders') }}">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                            </span>
                            <span class="menu-text">
                                Đơn Hàng
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ router('customer') }}">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </span>
                            <span class="menu-text">
                                Khách Hàng
                            </span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Preview Setting Box -->
	<div class="slide-setting-box">
        <div class="slide-setting-holder">
            <div class="setting-box-head">
                <h4>Dashboard Demo</h4>
                <a href="javascript:void(0);" class="close-btn">Close</a>
            </div>
            <div class="setting-box-body">
				<div class="sd-light-vs"> 
					<a href="index.html">
						Light Version
						<img src="{{ router('') }}public/assets/images/light.png" alt=""/>
					</a>
				</div>
				<div class="sd-light-vs"> 
                        <a href="https://kamleshyadav.com/html/splashdash/HTML/bootstrep-5/splashdash-admin-template-dark/index.html">
						dark Version
						<img src="{{ router('') }}public/assets/images/dark.png" alt=""/>
					</a>
				</div>
            </div>
			<div class="sd-color-op">
				<h5>color option</h5> 
				<div id="style-switcher">
					<div>
						<ul class="colors">
							<li>
								<p class='colorchange' id='color'>
								</p>
							</li>
							<li>
								<p class='colorchange' id='color2'>
								</p>
							</li>
							<li>
								<p class='colorchange' id='color3'>
								</p>
							</li>
							<li>
								<p class='colorchange' id='color4'>
								</p>
							</li>
							<li>
								<p class='colorchange' id='color5'>
								</p>
							</li>
							<li>
								<p class='colorchange' id='style'>
								</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
        </div>
    </div>
    <!-- Preview Setting -->
	
	
    <!-- Script Start -->
	@include('templates.mainJs')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $('select').selectpicker();
	$(document).ready(function() {
		$('#example').DataTable();
	} );
	</script>

<!-- Mirrored from kamleshyadav.com/html/splashdash/HTML/bootstrep-5/splashdash-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Nov 2022 09:36:54 GMT -->
</html>