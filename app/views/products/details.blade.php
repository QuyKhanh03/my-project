@extends('layout.displays')
@section('content')
    {{-- @php
        echo "<pre>";
        echo print_r($product_related);
        echo "</pre>";

    @endphp --}}
    <div class="ltn__shop-details-area pb-85 mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="ltn__shop-details-inner mb-60">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            <a href="{{ url('public/img/product/') }}{{ $product->image }}" data-rel="lightcase:myCollection">
                                                <img style="width: 570px; height: 570px;" src="{{ url('public/img/product/') }}{{ $product->image }}" alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ url('public/img/product/') }}{{ $product->image }}" data-rel="lightcase:myCollection">
                                                <img src="{{ url('public/img/product/') }}{{ $product->image }}" alt="Image">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ltn__shop-details-small-img slick-arrow-2">
                                        <div class="single-small-img">
                                            <img style="width: 135px; height: 135px;" src="{{ url('public/img/product/') }}{{ $product->image }}" alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img style="width: 135px; height: 135px;" src="{{ url('public/img/product/') }}{{ $product->image }}" alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img style="width: 135px; height: 135px;" src="{{ url('public/img/product/') }}{{ $product->image }}" alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img style="width: 135px; height: 135px;" src="{{ url('public/img/product/') }}{{ $product->image }}" alt="Image">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                            {{-- <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li> --}}
                                        </ul>
                                    </div>
                                    <h3>{{ $product->name_product }}</h3>
                                    <div class="product-price">
                                        @php
                                        //tính giá tiền đã đc giảm = giá gốc * (100 - số % )/100
                                        $price_has_dropped = ($product->price_product * (100 - $product->sale_off)) / 100;
                                    @endphp
                                    @if ($product->sale_off > 0)
                                        <span>{{ number_format($price_has_dropped) }}
                                            <b>Đ</b></span>
                                        <del>{{ number_format($product->price_product) }}
                                            <b>Đ</b></del>
                                    @else
                                        <span>{{ number_format($price_has_dropped) }}
                                            <b>Đ</b></span>
                                    @endif
                                    </div>
                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                        <ul>
                                            <li>
                                                <strong>Danh mục:</strong> 
                                                <span>
                                                    <a href="#">{{ $product->name_category }}</a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__product-details-menu-2">
                                        <ul>
                                            <form action="#">
                                            <li>
                                                <div class="cart-plus-minus">
                                                    <input type="number" min="1" value="1" max="{{ $product->quantity_total }}"  name="qtybutton" class="cart-plus-minus-box">
                                                </div>
                                            </li>
                                            <li>
                                            
                                                <button class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span>Thêm vào giỏi hàng</span>
                                                </button>  
                                            </li>
                                            </form>
                                        </ul>
                                    </div>
                                    <div class="ltn__product-details-menu-3">
                                        <ul>
                                            <li>
                                                
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li>Share:</li>
                                            <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                    <hr>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Tab Start -->
                    <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                        <div class="ltn__shop-details-tab-menu">
                            <div class="nav">
                                <a class="active show" data-toggle="tab" href="#liton_tab_details_1_1">Mô tả</a>
                                <a data-toggle="tab" href="#liton_tab_details_1_2" class="">Đánh giá</a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <h4 class="title-2">Mô tả về {{ $product->name_product }}</h4>
                                    <p>{{ $product->short_description }}</p>
                                    <p>{{ $product->detail_description }}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_details_1_2">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <h4 class="title-2">Đánh giá từ khách hàng</h4>
                                    <div class="product-ratting">
                                        <ul>
                                            
                                            <li class="review-total"> <a href="#"> ( {{ $countComment }} đánh giá )</a></li>
                                        </ul>
                                    </div>
                                    <hr>
                                    @if(isset($_SESSION["success"]) && isset($_GET["msg"]))
                                                <div class="alert alert-success" role="alert">
                                                    {{ $_SESSION["success"] }}
                                                </div>
                                            @endif
                                    <!-- comment-area -->
                                    @foreach ($listComment as $value)                                 
                                    <div class="ltn__comment-area mb-30">
                                        <div class="ltn__comment-inner">
                                            <ul>
                                                {{-- @php
                                                    echo $dateTimeCurrent;
                                                    echo $value->time;
                                                @endphp      --}}
                                                <li>
                                                    <div class="ltn__comment-item clearfix">
                                                        <div class="ltn__commenter-img">
                                                            @if($value->avatar == null)
                                                                 <h2><i class="icon-user"></i></h2>
                                                            @else 
                                                            <img src="{{ url('public/img/testimonial/') }}{{ $value->avatar }}" >
                                                            @endif
                                                        </div>
                                                        <div class="ltn__commenter-comment">
                                                            <h6><a href="#">{{ $value->name_user }}</a></h6>
                                                            <div class="product-ratting">
                                                               
                                                            </div>
                                                            <p>{{ $value->content }}.</p>
                                                            <span class="ltn__comment-reply-btn">{{ ($dateTimeCurrent>=$value->time) ? "Vừa xong" : date('i:H | d-m-Y', strtotime($value->time)) }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    @endforeach
                                    <!-- comment-reply -->
                                    <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                        <form action="{{ url('comment') }}" method="POST">
                                            <input type="hidden" name="user_id" value="{{ $_SESSION["auth"]->id_user }}">
                                            <input type="hidden" name="product_id" value="{{ $product->id_product }}">
                                            <h4 class="title-2">Thêm đánh giá</h4>
                                            <div class="mb-30">
                                                <div class="add-a-review">
                                                    <h6>Đánh giá của bạn:</h6>
                                                    <div class="product-ratting">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <textarea required name="content" placeholder="Cảm nghĩ của bạn về sản phẩm của chúng tôi...."></textarea>
                                               
                                            </div>
                                            @if(isset($_SESSION["errors"]) && isset($_GET["msg"]))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $_SESSION["errors"] }}
                                                    <a href="{{ url('login') }}">! Đăng Nhập Ngay</a>
                                                </div>
                                            @endif
                                            
                                            
                                            
                                            <div class="btn-wrapper">
                                                <button name="btn" class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Tab End -->
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color"></h6>
                        <h1 class="section-title">Sản phẩm tương tự<span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__related-product-slider-one-active slick-arrow-1">
                @foreach ($product_related as $value )
                    
               
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="{{ url('product/'.$value->id_product) }}"><img style="width: 266px; height: 266px;" src="{{ url('public/img/product/') }}{{ $value->image }}" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    @if ($value->sale_off > 0)
                                    <li class="sale-badge">{{ $value->sale_off }}%</li>
                                @else
                                    <li class="sale-badge">New</li>
                                @endif
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
                            <h2 class="product-title"><a href="{{ url('product/'.$value->id_product) }}">{{ $value->name_product }}</a></h2>
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
@endsection