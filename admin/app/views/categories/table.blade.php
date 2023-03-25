@extends('templates.layout')
@section('content')
<div class="row">
    <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-title-wrapper">
            <div class="page-title-box ad-title-box-use">
                <h4 class="page-title">Danh mục sản phẩm</h4>
            </div>
            <div class="ad-breadcrumb">
                <ul>
                    
                    <li>
                        <div class="add-group">
                            <a href="add-category" style="text-decoration: none" class="ad-btn">Thêm mới loại sản phẩm</a>
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
                <h4>Danh mục sản phẩm</h4>
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
                            <th>Tên danh mục sản phẩm</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listCategory as $key => $value)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td ><b style="width: 50px; ">{{ $value->name_category}}</b></td>
                            
                            <td>
                                <a href="" class="btn btn-info">Xem</a> 
                                <a href="{{ router('delete-category/'.$value->id_category) }}" class="btn btn-danger">Xóa</a> 
                                <a href="{{ router('edit-category/'.$value->id_category) }}" class="btn btn-success">Sửa</a>
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