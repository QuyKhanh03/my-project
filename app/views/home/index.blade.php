 @extends('layout.displays')
 @section('content')
     <div class="ltn__banner-area mt-120">
         <div class="container">
             <div class="row ltn__custom-gutter--- justify-content-center">
                 <div class="col-lg-6 col-md-6">
                     <div class="ltn__banner-item">
                         <div class="ltn__banner-img">
                             <a href="shop.html"><img src="public/img/banner/13.png" alt="Banner Image"></a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 col-md-6">
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="ltn__banner-item">
                                 <div class="ltn__banner-img">
                                     <a href="shop.html"><img src="public/img/banner/14.png" alt="Banner Image"></a>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-12">
                             <div class="ltn__banner-item">
                                 <div class="ltn__banner-img">
                                     <a href="shop.html"><img src="public/img/banner/15.png" alt="Banner Image"></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- PRODUCT TAB AREA START (product-item-3) -->
     <div class="ltn__product-tab-area ltn__product-gutter pt-85 pb-70">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-title-area ltn__section-title-2 text-center">
                         <h1 class="section-title">Sản Phẩm</h1>
                     </div>
                     <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">
                         <div class="nav">
                             {{-- $listCategory là 1 array
                            dùng foreach để lọc ra các phần tử trong mảng 
                            nếu là index đầu tiền thì sẽ trả về class là active và show 
                            còn ngược lại là ''
                            --}}

                             @foreach ($listCategory as $index => $item)
                                 <a class="{{ $index == 0 ? 'active show' : '' }}" data-toggle="tab"
                                     href="#liton_tab_3_{{ $item->id_category }}">{{ $item->name_category }}</a>
                             @endforeach

                         </div>
                     </div>
                     @php
                         use App\Controllers\HomeController;
                     @endphp
                     <div class="tab-content">
                         @foreach ($listCategory as $index => $item)
                             <div class="tab-pane fade {{ $index == 0 ? 'active show' : '' }}"
                                 id="liton_tab_3_{{ $item->id_category }}">
                                 <div class="ltn__product-tab-content-inner">
                                     <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                         @php
                                             $listProductById = HomeController::tabsProduct($item->id_category);
                                         @endphp
                                         @foreach ($listProductById as $value)
                                             <!-- ltn__product-item -->
                                             <div class="col-lg-12">
                                                 <div class="ltn__product-item ltn__product-item-3 ">
                                                     <div class="product-img">
                                                         <a href="{{ url('product/' . $value->id_product) }}"><img
                                                                 style="width: 266px; height: 267px;"
                                                                 src="public/img/product/{{ $value->image }}"
                                                                 alt="#"></a>
                                                         <div class="product-badge">
                                                             <ul>
                                                                 @if ($value->sale_off > 0)
                                                                     <li class="sale-badge">{{ $value->sale_off }}%</li>
                                                                 @else
                                                                     <li class="sale-badge">New</li>
                                                                 @endif
                                                             </ul>
                                                         </div>
                                                         <div class="product-hover-action">
                                                             <ul>
                                                                 <li>
                                                                     <a href="{{ url('product/' . $value->id_product) }}"
                                                                         title="Quick View" data-toggle="modal"
                                                                         data-target="#quick_view_modal">
                                                                         <i class="far fa-eye"></i>
                                                                     </a>
                                                                 </li>
                                                                 <li>
                                                                     <a href="#" title="Add to Cart"
                                                                         data-toggle="modal"
                                                                         data-target="#add_to_cart_modal">
                                                                         <i class="fas fa-shopping-cart"></i>
                                                                     </a>
                                                                 </li>
                                                                 <li>
                                                                     <a href="#" title="Wishlist" data-toggle="modal"
                                                                         data-target="#liton_wishlist_modal">
                                                                         <i class="far fa-heart"></i></a>
                                                                 </li>
                                                             </ul>
                                                         </div>
                                                     </div>
                                                     <div class="product-info">
                                                         <div class="product-ratting">
                                                             <ul>
                                                                 <li><a href="#"><i class="fas fa-star"></i></a>
                                                                 </li>
                                                                 <li><a href="#"><i class="fas fa-star"></i></a>
                                                                 </li>
                                                                 <li><a href="#"><i class="fas fa-star"></i></a>
                                                                 </li>
                                                                 <li><a href="#"><i
                                                                             class="fas fa-star-half-alt"></i></a></li>
                                                                 <li><a href="#"><i class="far fa-star"></i></a>
                                                                 </li>
                                                                 <li class="review-total"> <a href="#"> (24)</a>
                                                                 </li>
                                                             </ul>
                                                         </div>
                                                         <h2 class="product-title"><a
                                                                 href="{{ url('product/' . $value->id_product) }}">{{ $value->name_product }}</a>
                                                         </h2>
                                                         <div class="product-price">
                                                             @php
                                                                 //tính giá tiền đã đc giảm = giá gốc * (100 - số % )/100
                                                                 $price_has_dropped = ($value->price_product * (100 - $value->sale_off)) / 100;
                                                             @endphp
                                                             @if ($value->sale_off > 0)
                                                                 <span>{{ number_format($price_has_dropped) }}
                                                                     <b>Đ</b></span>
                                                                 <del>{{ number_format($value->price_product) }}
                                                                     <b>Đ</b></del>
                                                             @else
                                                                 <span>{{ number_format($price_has_dropped) }}
                                                                     <b>Đ</b></span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                 </div>

                                             </div>
                                         @endforeach

                                     </div>
                                 </div>
                             </div>
                         @endforeach

                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- PRODUCT TAB AREA END -->

     <!-- COUNTDOWN AREA START -->
     <div class="ltn__call-to-action-area ltn__call-to-action-4 section-bg-1 pt-110 pb-120">
         <div class="container">
             <div class="row">
                 <div class="col-lg-5">
                     <img src="public/img/banner/11.png" alt="#">
                 </div>
                 <div class="col-lg-7">
                     <div class="call-to-action-inner call-to-action-inner-4 text-color-white--- text-center---">
                         <div class="section-title-area ltn__section-title-2 text-center---">
                             <h6 class="ltn__secondary-color">Todays Hot Deals</h6>
                             <h1 class="section-title">Original Stock Honey <br> Combo Package</h1>
                         </div>
                         <div class="ltn__countdown ltn__countdown-3 bg-white--" data-countdown="2021/12/28"></div>
                         <div class="btn-wrapper animated">
                             <a href="shop.html" class="theme-btn-1 btn btn-effect-1 text-uppercase">Shop now</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- COUNTDOWN AREA END -->

     <!-- PRODUCT AREA START (product-item-3) -->
     <div class="ltn__product-area ltn__product-gutter pt-115 pb-70">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-title-area ltn__section-title-2 text-center">
                         <h1 class="section-title">Sản Phẩm Mới</h1>
                     </div>
                 </div>
             </div>
             <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                 <!-- ltn__product-item -->
                 @foreach ($topProduct as $value)
                     <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="ltn__product-item ltn__product-item-3 text-left">
                             <div class="product-img">
                                 <a href="{{ url('product-detail/' . $value->id_product) }}"><img
                                         style="width: 260px; height: 265px;"
                                         src="public/img/product/{{ $value->image }}" alt="#"></a>
                                 <div class="product-badge">
                                     <ul>
                                         @if ($value->sale_off > 0)
                                             <li class="sale-badge">{{ $value->sale_off }}%</li>
                                         @else
                                             <li class="sale-badge">New</li>
                                         @endif
                                     </ul>
                                 </div>
                                 <div class="product-hover-action">
                                     <ul>
                                         <li>
                                             <a href="{{ url('product-detail/' . $value->id_product) }}"
                                                 title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                 <i class="far fa-eye"></i>
                                             </a>
                                         </li>
                                         <li>
                                             <a href="#" title="Add to Cart" data-toggle="modal"
                                                 data-target="#add_to_cart_modal">
                                                 <i class="fas fa-shopping-cart"></i>
                                             </a>
                                         </li>
                                         <li>
                                             <a href="#" title="Wishlist" data-toggle="modal"
                                                 data-target="#liton_wishlist_modal">
                                                 <i class="far fa-heart"></i></a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-info">
                                 <div class="product-ratting">
                                     <ul>
                                         <li><a href="#"><i class="fas fa-star"></i></a></li>
                                         <li><a href="#"><i class="fas fa-star"></i></a></li>
                                         <li><a href="#"><i class="fas fa-star"></i></a></li>
                                         <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                         <li><a href="#"><i class="far fa-star"></i></a></li>
                                     </ul>
                                 </div>
                                 <h2 class="product-title"><a
                                         href="{{ url('product-detail/' . $value->id_product) }}">{{ $value->name_product }}</a>
                                 </h2>
                                 <div class="product-price">
                                     @php
                                         //tính giá tiền đã đc giảm = giá gốc * (100 - số % )/100
                                         $price_has_dropped = ($value->price_product * (100 - $value->sale_off)) / 100;
                                     @endphp
                                     @if ($value->sale_off > 0)
                                         <span>{{ number_format($price_has_dropped) }} <b>Đ</b></span>
                                         <del>{{ number_format($value->price_product) }} <b>Đ</b></del>
                                     @else
                                         <span>{{ number_format($price_has_dropped) }} <b>Đ</b></span>
                                     @endif
                                 </div>
                             </div>
                         </div>
                     </div>
                 @endforeach


                 <!--  -->
             </div>
         </div>
     </div>
     <!-- PRODUCT AREA END -->
     <!-- VIDEO AREA START -->
     <div class="ltn__video-popup-area ltn__video-popup-margin">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="ltn__video-bg-img ltn__video-popup-height-600 bg-overlay-black-10-- bg-image"
                         data-bg="public/img/bg/15.jpg">
                         <a class="ltn__video-icon-2 ltn__video-icon-2-border"
                             href="https://www.youtube.com/embed/ATI7vfCgwXE?autoplay=1&amp;showinfo=0"
                             data-rel="lightcase:myCollection">
                             <i class="fa fa-play"></i>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- VIDEO AREA END -->

     <!-- TESTIMONIAL AREA START (testimonial-4) -->
     <div class="ltn__testimonial-area section-bg-1 pt-290 pb-70">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-title-area ltn__section-title-2 text-center">
                         <h6 class="section-subtitle ltn__secondary-color">// Testimonials</h6>
                         <h1 class="section-title">Clients Feedbacks<span>.</span></h1>
                     </div>
                 </div>
             </div>
             <div class="row ltn__testimonial-slider-3-active slick-arrow-1 slick-arrow-1-inner">
                 <div class="col-lg-12">
                     <div class="ltn__testimonial-item ltn__testimonial-item-4">
                         <div class="ltn__testimoni-img">
                             <img src="public/img/testimonial/6.jpg" alt="#">
                         </div>
                         <div class="ltn__testimoni-info">
                             <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt
                                 ut labore et dolore magna aliqua. </p>
                             <h4>Rosalina D. William</h4>
                             <h6>Founder</h6>
                         </div>
                         <div class="ltn__testimoni-bg-icon">
                             <i class="far fa-comments"></i>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-12">
                     <div class="ltn__testimonial-item ltn__testimonial-item-4">
                         <div class="ltn__testimoni-img">
                             <img src="public/img/testimonial/7.jpg" alt="#">
                         </div>
                         <div class="ltn__testimoni-info">
                             <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt
                                 ut labore et dolore magna aliqua. </p>
                             <h4>Rosalina D. William</h4>
                             <h6>Founder</h6>
                         </div>
                         <div class="ltn__testimoni-bg-icon">
                             <i class="far fa-comments"></i>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-12">
                     <div class="ltn__testimonial-item ltn__testimonial-item-4">
                         <div class="ltn__testimoni-img">
                             <img src="public/img/testimonial/1.jpg" alt="#">
                         </div>
                         <div class="ltn__testimoni-info">
                             <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt
                                 ut labore et dolore magna aliqua. </p>
                             <h4>Rosalina D. William</h4>
                             <h6>Founder</h6>
                         </div>
                         <div class="ltn__testimoni-bg-icon">
                             <i class="far fa-comments"></i>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-12">
                     <div class="ltn__testimonial-item ltn__testimonial-item-4">
                         <div class="ltn__testimoni-img">
                             <img src="public/img/testimonial/2.jpg" alt="#">
                         </div>
                         <div class="ltn__testimoni-info">
                             <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt
                                 ut labore et dolore magna aliqua. </p>
                             <h4>Rosalina D. William</h4>
                             <h6>Founder</h6>
                         </div>
                         <div class="ltn__testimoni-bg-icon">
                             <i class="far fa-comments"></i>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-12">
                     <div class="ltn__testimonial-item ltn__testimonial-item-4">
                         <div class="ltn__testimoni-img">
                             <img src="public/img/testimonial/5.jpg" alt="#">
                         </div>
                         <div class="ltn__testimoni-info">
                             <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt
                                 ut labore et dolore magna aliqua. </p>
                             <h4>Rosalina D. William</h4>
                             <h6>Founder</h6>
                         </div>
                         <div class="ltn__testimoni-bg-icon">
                             <i class="far fa-comments"></i>
                         </div>
                     </div>
                 </div>
                 <!--  -->
             </div>
         </div>
     </div>
     <!-- TESTIMONIAL AREA END -->

     <!-- BLOG AREA START (blog-3) -->
     <div class="ltn__blog-area pt-115 pb-70">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-title-area ltn__section-title-2 text-center">
                         <h1 class="section-title white-color---">Leatest Blog</h1>
                     </div>
                 </div>
             </div>
             <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                 <!-- Blog Item -->
                 <div class="col-lg-12">
                     <div class="ltn__blog-item ltn__blog-item-3">
                         <div class="ltn__blog-img">
                             <a href="blog-details.html"><img src="public/img/blog/1.jpg" alt="#"></a>
                         </div>
                         <div class="ltn__blog-brief">
                             <div class="ltn__blog-meta">
                                 <ul>
                                     <li class="ltn__blog-author">
                                         <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                     </li>
                                     <li class="ltn__blog-tags">
                                         <a href="#"><i class="fas fa-tags"></i>Services</a>
                                     </li>
                                 </ul>
                             </div>
                             <h3 class="ltn__blog-title"><a href="blog-details.html">Common Engine Oil Problems and
                                     Solutions</a></h3>
                             <div class="ltn__blog-meta-btn">
                                 <div class="ltn__blog-meta">
                                     <ul>
                                         <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                     </ul>
                                 </div>
                                 <div class="ltn__blog-btn">
                                     <a href="blog-details.html">Read more</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Blog Item -->
                 <div class="col-lg-12">
                     <div class="ltn__blog-item ltn__blog-item-3">
                         <div class="ltn__blog-img">
                             <a href="blog-details.html"><img src="public/img/blog/2.jpg" alt="#"></a>
                         </div>
                         <div class="ltn__blog-brief">
                             <div class="ltn__blog-meta">
                                 <ul>
                                     <li class="ltn__blog-author">
                                         <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                     </li>
                                     <li class="ltn__blog-tags">
                                         <a href="#"><i class="fas fa-tags"></i>Services</a>
                                     </li>
                                 </ul>
                             </div>
                             <h3 class="ltn__blog-title"><a href="blog-details.html">How and when to replace brake
                                     rotors</a></h3>
                             <div class="ltn__blog-meta-btn">
                                 <div class="ltn__blog-meta">
                                     <ul>
                                         <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>July 23, 2020</li>
                                     </ul>
                                 </div>
                                 <div class="ltn__blog-btn">
                                     <a href="blog-details.html">Read more</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Blog Item -->
                 <div class="col-lg-12">
                     <div class="ltn__blog-item ltn__blog-item-3">
                         <div class="ltn__blog-img">
                             <a href="blog-details.html"><img src="public/img/blog/3.jpg" alt="#"></a>
                         </div>
                         <div class="ltn__blog-brief">
                             <div class="ltn__blog-meta">
                                 <ul>
                                     <li class="ltn__blog-author">
                                         <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                     </li>
                                     <li class="ltn__blog-tags">
                                         <a href="#"><i class="fas fa-tags"></i>Services</a>
                                     </li>
                                 </ul>
                             </div>
                             <h3 class="ltn__blog-title"><a href="blog-details.html">Elenance, Servicing & Repairs</a>
                             </h3>
                             <div class="ltn__blog-meta-btn">
                                 <div class="ltn__blog-meta">
                                     <ul>
                                         <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>August 22, 2020
                                         </li>
                                     </ul>
                                 </div>
                                 <div class="ltn__blog-btn">
                                     <a href="blog-details.html">Read more</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Blog Item -->
                 <div class="col-lg-12">
                     <div class="ltn__blog-item ltn__blog-item-3">
                         <div class="ltn__blog-img">
                             <a href="blog-details.html"><img src="public/img/blog/4.jpg" alt="#"></a>
                         </div>
                         <div class="ltn__blog-brief">
                             <div class="ltn__blog-meta">
                                 <ul>
                                     <li class="ltn__blog-author">
                                         <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                     </li>
                                     <li class="ltn__blog-tags">
                                         <a href="#"><i class="fas fa-tags"></i>Services</a>
                                     </li>
                                 </ul>
                             </div>
                             <h3 class="ltn__blog-title"><a href="blog-details.html">Healthiest Vegetables on Earth</a>
                             </h3>
                             <div class="ltn__blog-meta-btn">
                                 <div class="ltn__blog-meta">
                                     <ul>
                                         <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                     </ul>
                                 </div>
                                 <div class="ltn__blog-btn">
                                     <a href="blog-details.html">Read more</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Blog Item -->
                 <div class="col-lg-12">
                     <div class="ltn__blog-item ltn__blog-item-3">
                         <div class="ltn__blog-img">
                             <a href="blog-details.html"><img src="public/img/blog/5.jpg" alt="#"></a>
                         </div>
                         <div class="ltn__blog-brief">
                             <div class="ltn__blog-meta">
                                 <ul>
                                     <li class="ltn__blog-author">
                                         <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                     </li>
                                     <li class="ltn__blog-tags">
                                         <a href="#"><i class="fas fa-tags"></i>Services</a>
                                     </li>
                                 </ul>
                             </div>
                             <h3 class="ltn__blog-title"><a href="blog-details.html">How te Your Tires Last Longer</a>
                             </h3>
                             <div class="ltn__blog-meta-btn">
                                 <div class="ltn__blog-meta">
                                     <ul>
                                         <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                     </ul>
                                 </div>
                                 <div class="ltn__blog-btn">
                                     <a href="blog-details.html">Read more</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--  -->
             </div>
         </div>
     </div>
     <!-- BLOG AREA END -->

     <!-- FEATURE AREA START ( Feature - 3) -->
     <div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="ltn__feature-item-box-wrap ltn__border-between-column white-bg">
                         <div class="row">
                             <div class="col-xl-3 col-md-6 col-12">
                                 <div class="ltn__feature-item ltn__feature-item-8">
                                     <div class="ltn__feature-icon">
                                         <img src="public/img/icons/icon-img/11.png" alt="#">
                                     </div>
                                     <div class="ltn__feature-info">
                                         <h4>Curated Products</h4>
                                         <p>Provide Curated Products for
                                             all product over $100</p>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-3 col-md-6 col-12">
                                 <div class="ltn__feature-item ltn__feature-item-8">
                                     <div class="ltn__feature-icon">
                                         <img src="public/img/icons/icon-img/12.png" alt="#">
                                     </div>
                                     <div class="ltn__feature-info">
                                         <h4>Handmade</h4>
                                         <p>We ensure the product quality
                                             that is our main goal</p>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-3 col-md-6 col-12">
                                 <div class="ltn__feature-item ltn__feature-item-8">
                                     <div class="ltn__feature-icon">
                                         <img src="public/img/icons/icon-img/13.png" alt="#">
                                     </div>
                                     <div class="ltn__feature-info">
                                         <h4>Natural Food</h4>
                                         <p>Return product within 3 days
                                             for any product you buy</p>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-3 col-md-6 col-12">
                                 <div class="ltn__feature-item ltn__feature-item-8">
                                     <div class="ltn__feature-icon">
                                         <img src="public/img/icons/icon-img/14.png" alt="#">
                                     </div>
                                     <div class="ltn__feature-info">
                                         <h4>Free home delivery</h4>
                                         <p>We ensure the product quality
                                             that you can trust easily</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- FEATURE AREA END -->
 @endsection
