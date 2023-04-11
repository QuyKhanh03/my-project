@extends('templates.layout')
@section('content')

<div class="row">
    <!-- Styled Table Card-->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col">
                        <span>Danh sách đơn hàng</span>
                    </div>
                @if(isset($_SESSION["success"]) && isset($_GET["msg"]))
                <div class="alert alert-success mt-4">
                    <strong>{{ $_SESSION["success"] }} !!!</strong> 
                </div>

                @endif
                <div class="col"><a href="{{ router('create-order') }}" class="btn btn-primary">Tạo đơn hàng</a></div>
                </div>
            </div>
            
            <div class="card-body">
               <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>  
                            </th>
                            <th>#</th>
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng</th>
                            <th>Trạng thái</th>
                            <th>Xem chi tiết</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $value )
                                            
                                        
                        <tr>
                            <td>   
                            </td>
                            <td>{{ ++$key }}</td>
                            <td>
                                <span class="img-thumb ">
                                    {{-- <img src="public/assets/images/table/1.jpg" alt=" "> --}}
                                    <span class="ml-2 ">{{ $value->name_user }}</span>
                                </span>
                            </td>
                            <td>{{ date("d/m/Y",strtotime($value->date_order)) }}</td>
                            <td>{{ number_format($value->total_amount) }} <b>VNĐ</b></td>
                            <td>
                                @if($value->status==0)
                                <span class="badge badge-warning">Đang chờ xử lý</span>
                                @elseif($value->status==1)
                                <span class="badge badge-info">Đang vận chuyển</span>
                                @elseif($value->status==2)
                                <span class="badge badge-success">Đã nhận được hàng</span>
                                @elseif($value->status==3)
                                <span class="badge badge-danger">Đã hủy</span>
                                @else 
                                <span class="badge badge-danger"></span>
                                @endif
                            </td>
                            
                            <td>
                                <a href="{{ router('order-detail/'.$value->id_order) }}" class="text-primary">Xem</a>
                            </td>
                            <td class="relative">
                               
                                <form action="{{ router('update-status') }}" method="POST">
                                    <input type="hidden" name="id_order" value="{{ $value->id_order }}">
                                    @if($value->status == 0)
                                    <button class="btn btn-primary {{ $value->status == 1 ? "disabled" : "" }}" name="btn" >Xác nhận đơn hàng</button>
                                    @else 
                                        #
                                    @endif
                                </form>     
                               

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