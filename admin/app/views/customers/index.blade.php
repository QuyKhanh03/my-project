@extends('templates.layout')
@section('content')
<div class="row">
    <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-title-wrapper">
            <div class="page-title-box ad-title-box-use">
                <h4 class="page-title">Danh sách người dùng</h4>
            </div>
            <div class="ad-breadcrumb">
                <ul>
                    
                    <li>
                        <div class="add-group">
                            <a href="add-product" style="text-decoration: none" class="ad-btn">Thêm mới người dùng</a>
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
                <h4>Người Dùng</h4>
                {{-- @if(isset($_SESSION["success"]) && isset($_GET["msg"]))
                <div class="alert alert-success mt-4">
                    <strong>{{ $_SESSION["success"] }} !!!</strong> 
                </div>
                @endif --}}
            </div>
            
            <div class="card-body">
               <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Họ Tên</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            
                            <th>Số đơn đã đặt</th> 
                            <th>Chức năng</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $key=>$value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->name_user }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ ($value->address != null) ? $value->address : "Chưa có" }}</td>
                                <td>{{ ($value->phone!=null) ? $value->phone : "Chưa có" }}</td>
                                
                                <td>{{ $value->count_orders }}</td>
                                <td>
                                    <a class="btn btn-info" href="">Xem</a> 
                                    <a class="btn btn-success" href="">Sửa</a> 
                                    <a class="btn btn-danger" href="">Xóa</a>
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