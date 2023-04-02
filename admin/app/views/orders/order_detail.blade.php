@extends('templates.layout')
@section('content')
{{-- @php
    
    echo "<pre>";
    print_r($orders);
@endphp --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
               
                <div class="tab-content default-tab" id="tab1">

                    <fieldset>
                        <strong>
                            <p class="mb-2">
                                <span  >Ngày lập hóa đơn: {{ date("d/m/Y", strtotime($info->date_order)) }} </span>
                            </p>
                            <p>
                                <label>Trị giá:  {{ number_format($info->total_amount) }} <b>VNĐ</b></label>
                            </p>
                            <p>
                                <label>Họ tên khách hàng : {{ $info->name_user }}</label>
                            </p>
                            <p>
                                <label>Địa chỉ: {{ $info->address }}</label>
                                <label><span style="margin-left:20px">Điện thoại: {{ $info->phone }}</span></label>
                                <label><span style="margin-left:20px">Email: {{ $info->email }}</span></label>
                            </p>
                            <strong>
                    </fieldset>
                   
                    <table class="table" border="1">
                        <thead class="table-dark">
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Đơn giá</td>
                                <td>Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $tong = 0; ?>
                            @foreach($orders as $item)
                            <?php $tong += $item->price_product * $item->quantity; ?>
                            <tr>
                                <td>{{ $item->name_product }}</td>
                                <td><img src="{{ router('../public/img/product/'.$item->image) }}" width="100px" height="100px"></td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price_product) }} <b>VNĐ</b></td>
                                <td>{{ number_format($item->price_product * $item->quantity) }} <b>VNĐ</b></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <p><input class="button print" type="button" value="In hóa đơn " name="btnIn" onclick="window.print()" /></p>
                                   
                                </td>
                                <td colspan="2">
                                    <div class="pagination">
                                        <h4>Tổng thành tiền: <?php echo number_format($tong) ?> <b>VNĐ</b></h4>
                                    </div>
                                   
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection