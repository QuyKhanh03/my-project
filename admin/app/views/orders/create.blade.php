@extends('templates.layout')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card chart-card">
                <div class="card-header">
                    <h4 class="has-btn">Thêm mới đơn hàng </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ router('create-order-post') }}" method="POST" >
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="region" class="col-md-2 col-form-label">Sản phẩm</label>
                                            <select name="product_id[]"  class="selectpicker select2 form-control select-opt" size="6" multiple data-live-search="true">
                                                @foreach ($products as $key => $value )
                                                <option value="{{ $value->id_product }}">{{ $value->name_product }}</option>
                                                 @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group col">
                                        <label class="col-md-2 col-form-label">Số lượng</label>
                                        <div class="col-md-10">
                                            <input name="quantity"  min="1" class="form-control" type="number" >
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="col-md-4 col-form-label">Số điện thoại</label>
                                        <div class="col-md-10 ">
                                            <input name="phone" class="form-control" type="text" >
                                        </div>
                                      
                                    </div>
                                    <div class="form-group col">
                                        <label class="col-md-4 col-form-label">Email</label>
                                        <div class="col-md-10">
                                            <input name="email" class="form-control" type="text" >
                                        </div>
                                       
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="col-md-4 col-form-label">Tên khách hàng</label>
                                        <div class="col-md-10 ">
                                            <input name="name_user" class="form-control" type="text" >
                                        </div>
                                      
                                    </div>
                                    
                                    <div class="form-group col">
                        
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
