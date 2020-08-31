@extends('layouts.app')
@section('content')
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Giỏ hàng của bạn</h2>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach($products as  $key => $product)
                    <tr>
                        <form action="">
                            <td>#{{ $i }}</td>
                            <td><a href="{{route('get.detail.product',[$product->options->pro_slug,$product->id])}}">{{ $product->name }}</a></td>
                            <td>
                                <img style="width: 60px;height: 65px" src="{{ pare_url_file($product->options->avatar) }}" alt="">
                            </td>
                            <td>{{ number_format($product->price,0,',','.') }}đ</td>
                            <td>
                                <input id="qty" type="number" min="1" max="100" class="form-control" style="width: 100px" value="{{ $product->qty }}" name="newqty">
                            </td>
                            <td>{{ number_format($product->qty * $product->price,0,',','.') }} đ</td>
                            <td>
                                <button type="submit" class="btn btn-xs "><i class="fa fa-pencil"></i> <a data-id-product = {{$product->id}} class="js-update-item-cart" data-id = {{$key}} href="{{route('ajax.get.shopping.update',$key)}}"> Cập nhật</a></button>
                                <button type="submit" class="btn btn-xs "><i class="fa fa-trash-o"></i> <a href="{{route('delete.shopping.cart',$key)}}"> Xóa</a></button>

                            </td>
                        </form>
                    </tr>
                    <?php $i ++  ?>
                @endforeach
                </tbody>

            </table>

            <form action="{{url('/check-coupon')}}" method="POST">
                @csrf
                <div class="col-xs-12">
                    <div class="pull-right form-group"><span><input name="co_coupon"  placeholder="Nhập mã giảm giá" type="text"> 
                        <input type="submit" class="btn btn-light" value="Cập nhật">
                    </span> </div>
                </div>
            </form>
            <div>
                @if(Session::get('coupon'))
                    @foreach(Session::get('coupon') as $key => $cou)
                   @php
                        $totalsale = $cou['co_value'];
                        $totalMoney = $totalMoney - $cou['co_value'];
                       
                    @endphp
                     <div class="col-xs-12">
                        <div class="pull-right form-group"><span> Mã giảm giá {{$cou['co_code']}} giảm:  {{number_format("$totalsale",2,",",".")  }} VNĐ</span> </div>
                    </div>
                    <h5 style="padding-bottom: 20px" class="pull-right">Tổng tiền cần thanh toán:
                    
                       {{ number_format("$totalMoney",2,",",".")}} VNĐ<a href="{{route('get.form.pay')}}" class="btn-success btn">Thanh toán</a></h5>
                    @endforeach



                @else
                    <h5 style="padding-bottom: 20px" class="pull-right">Tổng tiền cần thanh toán: {{number_format("$totalMoney",2,",",".")  }} VNĐ<a href="{{route('get.form.pay')}}" class="btn-success btn">Thanh toán</a></h5>
                @endif
            </div>
            

        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
               $(".js-update-item-cart").click( function(event) {
                    event.preventDefault();
                    let $this =$(this);
                    let url = $this.attr('href');
                    let qty = $("#qty").val();
                    let idProduct = $this.attr('data-id-product');

                    if(url) {
                        $.ajax({
                            url : url,
                            data: {
                                qty : qty,
                                idProduct : idProduct,
                            }
                        }).done(function (results) {
                            
                            alert(results.messages)
                           window.location.reload();
                        });
                    }
               })
        })
    </script>
@stop
