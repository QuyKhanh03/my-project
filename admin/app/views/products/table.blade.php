@extends('templates.layout')
@section('content')
<div class="row">
    <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-title-wrapper">
            <div class="page-title-box ad-title-box-use">
                <h4 class="page-title">Danh sách sản phẩm</h4>
            </div>
            <div class="ad-breadcrumb">
                <ul>
                    
                    <li>
                        <div class="add-group">
                            <a href="add-product" style="text-decoration: none" class="ad-btn">Thêm mới sản phẩm</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Styled Table Card-->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-card">
            <div class="card-header pb-0">
                <h4>Danh sách sản phẩm</h4>
                @if(isset($_SESSION["success"]) && isset($_GET["msg"]))
                <div class="alert alert-success mt-4">
                    <strong>{{ $_SESSION["success"] }} !!!</strong> 
                </div>
                @endif
            </div>
            
            <div class="card-body">
               <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Mô tả ngắn</th>
                            <th>Mô tả chi tiết</th>
                            <th>Tồn kho</th> 
                            {{-- <th>Ngày Nhập</th>    --}}
                            <th>Danh mục</th>
                            <th>Chức năng</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listProduct as $key => $value)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td ><b style="width: 50px; ">{{ $value->name_product }}</b></td>
                            <td >{{ number_format($value->price_product) }} <br> <b>VNĐ</b></td>
                            <td><img style="width: 110px; height: 110px;" src="../public/img/product/{{ $value->image }}" alt=""></td>
                            <td><p style="width: 150px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis">{{ $value->short_description }}</p></td>
                            <td><p style="width: 150px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis">{{ $value->detail_description }}</p></td>
                            <td>{{ $value->quantity_total }}</td>
                            {{-- <td>{{ date("d-m-Y",strtotime($value->date_added)) }}</td> --}}
                            <td style="width: 90px;">{{ $value->name_category }}</td>
                            <td>
                                <a href="" class="btn btn-info">Xem</a> <br>
                                <a href="" class="btn btn-danger">Xóa</a> <br>
                                <a href="{{ router('edit/'.$value->id_product) }}" class="btn btn-success">Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection