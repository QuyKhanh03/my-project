@extends('templates.layout')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card chart-card">
                <div class="card-header">
                    <h4 class="has-btn">Thêm mới danh mục sản phẩm </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ router('add-category-post') }}" method="POST" enctype="multipart/form-data">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="col-md-4 col-form-label">Tên danh mục sản phẩm</label>
                                        <div class="col-md-10">
                                            <input name="name_category" class="form-control" type="text" placeholder="Danh mục,...">
                                        </div>
                                        @if(isset($_SESSION["errors"]))
                                        <p style="color: red">{{ $_SESSION["errors"]["name_category"] }}</p>
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
