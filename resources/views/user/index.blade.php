@extends('user.layout')
@section('content')

    <h1 class="page-header">Quản lý tài khoản</h1>
    <div class="row placeholders">
        <div class="col-xs-8 col-sm-8 placeholder" style="text-align: left;">
            <h3 >Thông tin cá nhân</h3>
            <div>Tên: {{$user->name}}</div>
            <div>Email: {{$user->email}}</div>
             <div>Giới thiệu: {{$user->about}}</div>
            <br>
            <a href="{{route('user.update.info')}}">Chỉnh sửa</a>
        </div>
        
        <div class="col-xs-4 col-sm-4 placeholder" style="text-align: left;">
           <h3>Địa chỉ mặc định</h3>
           <div>Địa chỉ: {{$user->address}}</div>
            <div>Số điện thoại: {{$user->phone}}</div>
            <br>
             <a href="{{route('user.update.info')}}">Chỉnh sửa</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Quản lý đơn hàng</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Mã ĐH</th>
                    <th>Người nhận</th>
                    <th>Địa chỉ nhận</th>
                    <th>Số điện thoại</th>
                    <th>Tổng Tiền</th>
                    <th>Hình thức thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Thời gian đặt</th>
                    <th>Chi tiết</th>
                </tr>
                </thead>
                <tbody>
                     @if (isset($transactions))
                         @foreach($transactions as $transaction)
                             <tr>
                                 <td>#{{ $transaction->id }}</td>
                                 <td>{{ $transaction->tr_user_name }}</td>
                                 <td>{{ $transaction->tr_address }}</td>
                                 <td>{{ $transaction->tr_phone }}</td>
                                 <td>{{ number_format($transaction->tr_total,0,',','.') }} VNĐ</td>
                                 <td>{{ $transaction->tr_type }}</td>
                                 <td>
                                     @if ( $transaction->tr_status == 1)
                                         <a href="#" class="label-success label">{{$transaction->tr_sta}}</a><br>
                                         <a href="http://www.vnpost.vn/vi-vn/dinh-vi/buu-pham?key={{$transaction->tr_codeship}}" class="">Tra cứu</a>
                                     @else
                                         <a href="#" class="label label-default">Chờ xử lý</a>
                                     @endif
                                 </td>
                                 <td>
                                     {{ $transaction->created_at }}
                                 </td>
                                 <td>
                        
                                <a style="" class="btn_customer_action js_order_item" data-id="{{ $transaction->id }}" href="{{ route('user.get.view.order',$transaction->id) }}"><i class="fas fa-eye"></i>Xem</a></td>
                             </tr>
                         @endforeach
                     @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModalOrder" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>


                    <h4 class="modal-title">Chi tiết mã đơn hàng #<b class="transaction_id"></b></h4>
                </div>
                <div class="modal-body" id="md_content">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>
@stop
@section('script')
    <script>
        $(function(){
            $(".js_order_item").click(function(event){
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $("#md_content").html('')
                $(".transaction_id").text('').text($this.attr('data-id'));

                $("#myModalOrder").modal('show');

                $.ajax({
                    url: url,
                }).done(function(result) {
                    if (result)
                    {
                        $("#md_content").append(result);
                    }
                });
            });
        })
    </script>
@stop