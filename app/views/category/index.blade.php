@extends('layout.displays')
@section('content')
<!-- PRODUCT DETAILS AREA START -->
<div class="ltn__product-area ltn__product-gutter mb-120 mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="ltn__shop-options">
                    <ul>
                        <li>
                            <div class="ltn__grid-list-tab-menu ">
                                <div class="nav">
                                    <a class="active show" data-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                    <a data-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_product_grid">
                        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                            <div class="row">
                                
                                @foreach ($productByCategory as $value )
                                    
                                
                                <!-- ltn__product-item -->
                                <div class="col-xl-4 col-sm-6 col-6">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img style="width: 250px; height: 250px;" src="{{ url('public/img/product/') }}{{ $value->image }}" alt="#"></a>
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
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="liton_product_list">
                        <div class="ltn__product-tab-content-inner ltn__product-list-view">
                            <div class="row">
                                @foreach ($productByCategory as $value)
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3">
                                        <div class="product-img">
                                            <a href="{{ url('product/'.$value->id_product) }}"><img style="width: 500px; height: 500px;" src="{{ url('public/img/product/') }}{{ $value->image }}" alt="#"></a>
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
                                            <h2 class="product-title"><a href="{{ url('product/'.$value->id_product) }}">{{ $value->name_product }}</a></h2>
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                </ul>
                                            </div>
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
                                            <div class="product-brief">
                                                <p>{{ $value->short_description }}</p>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4 py-5">
                <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar mt-5">
                    <!-- Category Widget -->
                    <div class="widget ltn__menu-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Danh mục sản phẩm</h4>
                        <ul>
                            @foreach ($categories as $value )
                                
                            <li ><a href="{{ url('category/'.$value->id_category) }}">{{ $value->name_category }} <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            @endforeach
                        </ul>
                    </div>
                   
                  
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT DETAILS AREA END -->


    
@endsection