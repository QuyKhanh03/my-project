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
                        <div class="setting-wrapper header-links">
                            <a href="javascript:void(0);" class="setting-info">
                                <span class="header-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
									  <path d="M18.777,12.289 L17.557,12.493 C17.439,12.854 17.287,13.220 17.105,13.585 L17.825,14.599 C18.236,15.178 18.170,15.964 17.668,16.467 L16.454,17.683 C15.960,18.177 15.139,18.238 14.588,17.838 L13.583,17.119 C13.234,17.294 12.869,17.446 12.491,17.571 L12.284,18.795 C12.167,19.497 11.566,20.006 10.855,20.006 L9.137,20.006 C8.426,20.006 7.825,19.497 7.708,18.794 L7.504,17.571 C7.138,17.450 6.786,17.305 6.455,17.139 L5.431,17.869 C4.875,18.268 4.060,18.202 3.570,17.712 L2.356,16.496 C1.853,15.995 1.787,15.209 2.200,14.627 L2.915,13.630 C2.735,13.279 2.581,12.913 2.456,12.540 L1.218,12.329 C0.518,12.212 0.009,11.609 0.009,10.898 L0.009,9.180 C0.009,8.468 0.518,7.865 1.219,7.748 L2.422,7.545 C2.545,7.164 2.694,6.797 2.867,6.447 L2.139,5.421 C1.727,4.842 1.793,4.057 2.295,3.553 L3.513,2.337 C3.991,1.846 4.818,1.777 5.380,2.181 L6.376,2.901 C6.725,2.721 7.091,2.566 7.464,2.441 L7.675,1.200 C7.793,0.498 8.394,-0.011 9.104,-0.011 L10.818,-0.011 C11.528,-0.011 12.130,0.498 12.247,1.201 L12.451,2.407 C12.833,2.530 13.214,2.687 13.591,2.877 L14.602,2.155 C15.157,1.757 15.973,1.822 16.463,2.313 L17.676,3.528 C18.180,4.028 18.246,4.814 17.833,5.396 L17.112,6.405 C17.288,6.754 17.440,7.121 17.564,7.500 L18.786,7.707 C19.492,7.825 19.997,8.429 19.986,9.143 L19.986,10.856 C19.986,11.569 19.478,12.172 18.777,12.289 ZM16.815,8.984 C16.507,8.935 16.256,8.705 16.180,8.397 C16.030,7.816 15.800,7.262 15.498,6.755 C15.339,6.480 15.353,6.140 15.536,5.887 L16.472,4.568 L15.421,3.514 L14.111,4.458 C13.855,4.640 13.515,4.654 13.248,4.495 C12.722,4.184 12.157,3.952 11.566,3.803 C11.261,3.727 11.030,3.475 10.977,3.162 L10.711,1.574 L9.227,1.574 L8.953,3.187 C8.902,3.490 8.675,3.739 8.375,3.822 C7.801,3.971 7.251,4.203 6.735,4.513 C6.463,4.675 6.124,4.660 5.866,4.481 L4.555,3.543 L3.503,4.595 L4.451,5.930 C4.632,6.183 4.648,6.521 4.491,6.790 C4.193,7.297 3.967,7.852 3.819,8.439 C3.744,8.743 3.494,8.975 3.181,9.028 L1.596,9.295 L1.596,10.782 L3.205,11.057 C3.508,11.108 3.758,11.336 3.839,11.636 C3.987,12.210 4.219,12.762 4.530,13.280 C4.690,13.552 4.676,13.893 4.496,14.150 L3.561,15.465 L4.612,16.518 L5.943,15.569 C6.170,15.399 6.533,15.375 6.799,15.528 C7.309,15.822 7.851,16.044 8.408,16.189 C8.708,16.265 8.937,16.514 8.990,16.825 L9.257,18.425 L10.740,18.425 L11.010,16.825 C11.057,16.516 11.287,16.265 11.594,16.189 C12.176,16.037 12.729,15.807 13.234,15.505 C13.509,15.344 13.850,15.360 14.101,15.542 L15.418,16.482 L16.469,15.428 L15.530,14.102 C15.348,13.843 15.334,13.512 15.494,13.239 C15.797,12.728 16.027,12.174 16.176,11.591 C16.253,11.289 16.503,11.060 16.811,11.007 L18.408,10.740 L18.413,9.255 L16.815,8.984 ZM10.000,14.453 C7.547,14.453 5.550,12.454 5.550,9.996 C5.550,7.537 7.547,5.537 10.000,5.537 C12.454,5.537 14.449,7.537 14.449,9.996 C14.449,12.454 12.454,14.453 10.000,14.453 ZM10.000,7.127 C8.422,7.127 7.137,8.413 7.137,9.996 C7.137,11.577 8.422,12.864 10.000,12.864 C11.579,12.864 12.863,11.577 12.863,9.996 C12.863,8.413 11.579,7.127 10.000,7.127 Z" class="cls-1"></path>
									</svg>
                                </span>
                            </a>
                        </div>
                        <div class="cart-wrapper header-links">
                            <a href="javascript:void(0);" class="cart-info">
                                <span class="header-icon">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M402.351,381.058h-203.32l-11.806-47.224h266.587L512,101.085H129.038L108.882,20.46H0v33.4h82.804l82.208,328.827
                                                    c-24.053,5.971-41.938,27.737-41.938,53.611c0,30.461,24.781,55.242,55.241,55.242c30.459,0,55.241-24.781,55.241-55.242
                                                    c0-7.755-1.613-15.138-4.511-21.841h122.577c-2.897,6.703-4.511,14.086-4.511,21.841c0,30.461,24.781,55.242,55.241,55.242
                                                    c30.459,0,55.241-24.781,55.241-55.242C457.592,405.84,432.811,381.058,402.351,381.058z M287.029,300.434h-37.08l-8.284-66.275
                                                    h45.365V300.434z M411.912,134.484h57.31l-16.568,66.275h-49.026L411.912,134.484z M399.453,234.16h44.85l-16.568,66.275h-36.566
                                                    L399.453,234.16z M320.428,134.484h57.824l-8.284,66.275h-49.539V134.484z M320.428,234.159h45.365l-8.284,66.275h-37.08V234.159z
                                                     M287.029,134.484v66.275h-49.539l-8.284-66.275H287.029z M137.388,134.484h58.158l8.284,66.275h-49.873L137.388,134.484z
                                                     M162.307,234.159h45.699l8.284,66.275h-37.414L162.307,234.159z M178.315,458.141c-12.043,0-21.841-9.798-21.841-21.842
                                                    c0-12.043,9.798-21.841,21.841-21.841s21.841,9.798,21.841,21.841C200.156,448.343,190.358,458.141,178.315,458.141z
                                                     M402.351,458.141c-12.043,0-21.841-9.798-21.841-21.842c0-12.043,9.798-21.841,21.841-21.841
                                                    c12.043,0,21.841,9.798,21.841,21.841C424.192,448.343,414.394,458.141,402.351,458.141z"/>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                                <span class="item-count">03</span>
                            </a>
							<div class="of-notification-comment">
								<div class="of-nt-text">
									<h5>Shopping Cart</h5>
									<h6>Your Have 3 Item In Your Cart</h6>
								</div>
								<div class="of-nt-scroll">
								
								<div class="of-nt-flex">
									<div class="of-nt-img">
										<img src="{{ router('public/assets/images/product2.png') }}" alt=""/>
									</div>
									<div class="of-nt-cmnt">
										<p>Ceiling Light<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="9px" height="8px">
											<defs>
											<filter>
												<feFlood flood-color="#222222" flood-opacity="1" result="floodOut"></feFlood>
												<feComposite operator="atop" in="floodOut" in2="SourceGraphic" result="compOut"></feComposite>
												<feBlend mode="normal" in="compOut" in2="SourceGraphic"></feBlend>
											</filter>

											</defs>
											<g>
											<path fill-rule="evenodd" fill="#222222" d="M4.713,3.998 L7.864,0.850 C8.060,0.654 8.060,0.337 7.864,0.142 C7.668,-0.054 7.351,-0.054 7.155,0.142 L4.005,3.290 L0.854,0.142 C0.659,-0.054 0.342,-0.054 0.146,0.142 C-0.050,0.337 -0.050,0.654 0.146,0.850 L3.296,3.998 L0.146,7.146 C-0.050,7.341 -0.050,7.658 0.146,7.854 C0.244,7.952 0.372,8.001 0.500,8.001 C0.628,8.001 0.756,7.952 0.854,7.854 L4.005,4.706 L7.155,7.854 C7.253,7.952 7.381,8.001 7.510,8.001 C7.638,8.001 7.766,7.952 7.864,7.854 C8.060,7.658 8.060,7.341 7.864,7.146 L4.713,3.998 Z"></path>
											</g>
											</svg>
										</span></p>
										<div class="int-table-quantity">
											<div class="quantity-wrapper">
												<div class="quantity-qty">
													<h5>$100</h5>
												</div>
												<div class="input-group">
													<span class="quantity-minus"> - </span>
													<input type="number" class="quantity" value="2">
													<span class="quantity-plus"> + </span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="of-nt-flex">
									<div class="of-nt-img">
										<img src="{{ router('public/assets/images/product3.png') }}" alt=""/>
									</div>
									<div class="of-nt-cmnt">
										<p>Wooden Sofa<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="9px" height="8px">
											<defs>
											<filter>
												<feFlood flood-color="#222222" flood-opacity="1" result="floodOut"></feFlood>
												<feComposite operator="atop" in="floodOut" in2="SourceGraphic" result="compOut"></feComposite>
												<feBlend mode="normal" in="compOut" in2="SourceGraphic"></feBlend>
											</filter>

											</defs>
											<g>
											<path fill-rule="evenodd" fill="#222222" d="M4.713,3.998 L7.864,0.850 C8.060,0.654 8.060,0.337 7.864,0.142 C7.668,-0.054 7.351,-0.054 7.155,0.142 L4.005,3.290 L0.854,0.142 C0.659,-0.054 0.342,-0.054 0.146,0.142 C-0.050,0.337 -0.050,0.654 0.146,0.850 L3.296,3.998 L0.146,7.146 C-0.050,7.341 -0.050,7.658 0.146,7.854 C0.244,7.952 0.372,8.001 0.500,8.001 C0.628,8.001 0.756,7.952 0.854,7.854 L4.005,4.706 L7.155,7.854 C7.253,7.952 7.381,8.001 7.510,8.001 C7.638,8.001 7.766,7.952 7.864,7.854 C8.060,7.658 8.060,7.341 7.864,7.146 L4.713,3.998 Z"></path>
											</g>
										</svg>
										</span></p>
										<div class="int-table-quantity">
											<div class="quantity-wrapper">
												<div class="quantity-qty">
													<h5>$65</h5>
												</div>
												<div class="input-group">
													<span class="quantity-minus"> - </span>
													<input type="number" class="quantity" value="2">
													<span class="quantity-plus"> + </span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="of-nt-flex">
									<div class="of-nt-img">
										<img src="{{ router('public/assets/images/product.png') }}" alt=""/>
									</div>
									<div class="of-nt-cmnt">
										<p>Dining Chair<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="9px" height="8px">
											<defs>
											<filter>
												<feFlood flood-color="#222222" flood-opacity="1" result="floodOut"></feFlood>
												<feComposite operator="atop" in="floodOut" in2="SourceGraphic" result="compOut"></feComposite>
												<feBlend mode="normal" in="compOut" in2="SourceGraphic"></feBlend>
											</filter>

											</defs>
											<g>
											<path fill-rule="evenodd" fill="#222222" d="M4.713,3.998 L7.864,0.850 C8.060,0.654 8.060,0.337 7.864,0.142 C7.668,-0.054 7.351,-0.054 7.155,0.142 L4.005,3.290 L0.854,0.142 C0.659,-0.054 0.342,-0.054 0.146,0.142 C-0.050,0.337 -0.050,0.654 0.146,0.850 L3.296,3.998 L0.146,7.146 C-0.050,7.341 -0.050,7.658 0.146,7.854 C0.244,7.952 0.372,8.001 0.500,8.001 C0.628,8.001 0.756,7.952 0.854,7.854 L4.005,4.706 L7.155,7.854 C7.253,7.952 7.381,8.001 7.510,8.001 C7.638,8.001 7.766,7.952 7.864,7.854 C8.060,7.658 8.060,7.341 7.864,7.146 L4.713,3.998 Z"></path>
											</g>
											</svg>
										</span></p>
										<div class="int-table-quantity">
											<div class="quantity-wrapper">
												<div class="quantity-qty">
													<h5>$86</h5>
												</div>
												<div class="input-group">
													<span class="quantity-minus"> - </span>
													<input type="number" class="quantity" value="2">
													<span class="quantity-plus"> + </span>
												</div>
											</div>
										</div>
									</div>
								</div>
								</div>
								<div class="int-flex-total">
									<h4>Order Total - </h4>
									<h5>$251</h5>
								</div>
								<div class="int-sop-cart-btn">
									<a href="cart.html" class="ad-btn">View cart</a>
									<a href="checkout.html" class="ad-btn">checkout</a>
								</div>
							</div>
                        </div>

                        <div class="notification-wrapper header-links">
                            <a href="javascript:void(0);" class="notification-info">
                                <span class="header-icon">
                                    <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m450.201 407.453c-1.505-.977-12.832-8.912-24.174-32.917-20.829-44.082-25.201-106.18-25.201-150.511 0-.193-.004-.384-.011-.576-.227-58.589-35.31-109.095-85.514-131.756v-34.657c0-31.45-25.544-57.036-56.942-57.036h-4.719c-31.398 0-56.942 25.586-56.942 57.036v34.655c-50.372 22.734-85.525 73.498-85.525 132.334 0 44.331-4.372 106.428-25.201 150.511-11.341 24.004-22.668 31.939-24.174 32.917-6.342 2.935-9.469 9.715-8.01 16.586 1.473 6.939 7.959 11.723 15.042 11.723h109.947c.614 42.141 35.008 76.238 77.223 76.238s76.609-34.097 77.223-76.238h109.947c7.082 0 13.569-4.784 15.042-11.723 1.457-6.871-1.669-13.652-8.011-16.586zm-223.502-350.417c0-14.881 12.086-26.987 26.942-26.987h4.719c14.856 0 26.942 12.106 26.942 26.987v24.917c-9.468-1.957-19.269-2.987-29.306-2.987-10.034 0-19.832 1.029-29.296 2.984v-24.914zm29.301 424.915c-25.673 0-46.614-20.617-47.223-46.188h94.445c-.608 25.57-21.549 46.188-47.222 46.188zm60.4-76.239c-.003 0-213.385 0-213.385 0 2.595-4.044 5.236-8.623 7.861-13.798 20.104-39.643 30.298-96.129 30.298-167.889 0-63.417 51.509-115.01 114.821-115.01s114.821 51.593 114.821 115.06c0 .185.003.369.01.553.057 71.472 10.25 127.755 30.298 167.286 2.625 5.176 5.267 9.754 7.861 13.798z"/></svg>
                                </span>
                                <span class="count-notification"></span>
                            </a>
                            <div class="recent-notification">
                                <div class="drop-down-header">
                                    <h4>All Notification</h4>
                                    <p>You have 6 new notifications</p>
                                </div>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h5><i class="fas fa-exclamation-circle mr-2"></i>Storage Full</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h5><i class="far fa-envelope mr-2"></i>New Membership</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </a>
                                    </li>
                                </ul>
                                <div class="drop-down-footer">
                                    <a href="javascript:void(0);" class="btn sm-btn">
                                        View All
                                    </a>
                                </div>
                            </div>
                        </div>
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
                                    <h4>John Brown</h4>
                                    <p>UI | UX Designer</p>
                                </div>
                                <ul>
                                    <li>
                                        <a href="profile.html">
                                            <i class="far fa-edit"></i> Edit Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="setting.html">
                                            <i class="fas fa-cog"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login.html">
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
                        <a href="products">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            </span>
                            <span class="menu-text">
                                Sản Phẩm
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="orders.html">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                            </span>
                            <span class="menu-text">
                                Đơn Hàng
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="customers.html">
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
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
	</script>

<!-- Mirrored from kamleshyadav.com/html/splashdash/HTML/bootstrep-5/splashdash-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Nov 2022 09:36:54 GMT -->
</html>