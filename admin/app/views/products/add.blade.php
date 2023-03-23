@extends('templates.layout')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card chart-card">
                <div class="card-header">
                    <h4 class="has-btn">Thêm mới sản phẩm </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ router('add-product-post') }}" method="POST" enctype="multipart/form-data">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="col-md-4 col-form-label">Tên sản phẩm</label>
                                        <div class="col-md-10">
                                            <input name="name_product" class="form-control" type="text" placeholder="Bánh Mỳ, Khô Gà,...">
                                        </div>
                                        @if(isset($_SESSION["errors"]))
                                        <p style="color: red">{{ $_SESSION["errors"]["name_product"] }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group col">
                                        <label class="col-md-2 col-form-label">Đơn giá</label>
                                        <div class="col-md-10">
                                            <input name="price_product" class="form-control" type="text" placeholder="10000">
                                        </div>
                                        @if(isset($_SESSION["errors"]))
                                        <p style="color: red">{{ $_SESSION["errors"]["price_product"] }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="col-md-4 col-form-label">Hình ảnh</label>
                                        <div class="col-md-10 ">
                                            <input name="image" class="form-control" type="file" >
                                        </div>
                                        @if(isset($_SESSION["errors"]))
                                        <p style="color: red">{{ $_SESSION["errors"]["image"] }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group col">
                                        <label class="col-md-4 col-form-label">Mô tả ngắn</label>
                                        <div class="col-md-10">
                                            <input name="short_description" class="form-control" type="text" placeholder="Mô tả ngắn">
                                        </div>
                                        @if(isset($_SESSION["errors"]))
                                        <p style="color: red">{{ $_SESSION["errors"]["short_description"] }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="col-md-2 col-form-label">Mô tả chi tiết</label>
                                        <div class="col-md-10">
                                            <input name="detail_description" class="form-control" type="text" placeholder="Mô tả chi tiết">
                                        </div>
                                        @if(isset($_SESSION["errors"]))
                                        <p style="color: red">{{ $_SESSION["errors"]["detail_description"] }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group col">
                                        <label class="col-md-2 col-form-label">Số lượng</label>
                                        <div class="col-md-10">
                                            <input name="quantity_total" class="form-control" type="text" placeholder="20,30,...">
                                        </div>
                                        @if(isset($_SESSION["errors"]))
                                        <p style="color: red">{{ $_SESSION["errors"]["quantity_total"] }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="col-md-2 col-form-label">Giảm giá</label>
                                        <div class="col-md-10">
                                            <input name="sale_off" value="0" class="form-control" type="text" placeholder="20,30,...">
                                        </div>
                                        @if(isset($_SESSION["errors"]))
                                        <p style="color: red">{{ $_SESSION["errors"]["sale_off"] }}</p>
                                        @endif
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6  col">
                                        <div class="form-group s-opt col-10">
                                            <label for="region" class="col-form-label">Danh mục sản phẩm</label>
                                            <select name="category_id"  class="select2 form-control select-opt" id="region">
                                                <optgroup label="Danh mục sản phẩm">
                                                    <option value="">Danh mục</option>
                                                    @foreach ($categories as $key => $value )
                                                        <option value="{{ $value->id_category }}">{{ $value->name_category }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            
                                            <span class="sel_arrow">
                                                <i class="fa fa-angle-down "></i>
                                            </span>
                                            
                                        </div>
                                        @if(isset($_SESSION["errors"]))
                                            <p style="color: red">{{ $_SESSION["errors"]["category_id"] }}</p>
                                            @endif
                                    </div>
                                </div>
                                <button name="btn" type="submit" class="btn btn-primary ">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
