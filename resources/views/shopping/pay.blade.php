@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="">Giỏ hàng</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Thanh toán</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container wrapper">
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                    @csrf
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                        
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Danh sách sản phẩm <div class="pull-right"><small><a class="afix-1" href="{{ route('get.list.shopping.cart') }}">Cập nhật</a></small></div>
                            </div>
                            <div class="panel-body">
                                @foreach($products as $product)
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" style="width: 100px;height: 100px" src="{{ pare_url_file($product->options->avatar) }}" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">{{ $product->name }}</div>
                                            <div class="col-xs-12"><small>Số lượng x <span>{{ $product->qty }}</span></small></div>
                                            <!-- <div class="col-xs-12"><small>Màu sắc <span>
                                                <select name="color" id="" class="">
                                                    <option value="Mặc định">Mặc định</option>
                                                         
                                                </select></span></small></div> -->
                                            </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <h6>{{ number_format($product->price,0,',','.') }} <span>VNĐ</span></h6>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>
                                @endforeach
                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                      
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <strong>Tổng tiền:  </strong>
                                                    <div class="pull-right"><span> {{ number_format("$totalMoney")}}</span> VNĐ</div>
                                                </div>
                                                 @php
                                                    $totalsale = $cou['co_value'];
                                                    $totalMoney = $totalMoney - $cou['co_value'];
                                                   
                                                @endphp
                                                <div class="col-xs-12">
                                                    <strong>Mã giảm giá:  </strong>
                                                    <div class="pull-right"><span> - {{number_format("$totalsale")  }}</span> VNĐ</div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <strong>Tổng Tiền thanh toán:</strong>
                                                    <div class="pull-right"><span > {{ number_format("$totalMoney")}}</span> VNĐ</div>
                                                </div>
                                                 
                                            </div>
                                     @endforeach
                                 @else
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <strong>Tổng Tiền</strong>
                                                    <div class="pull-right"><span  > {{ number_format("$totalMoney")}}</span> VNĐ</div>
                                                </div>
                                            </div>
                                @endif

                            </div>
                        </div>

                            <div class="panel panel-info">
                            <div class="panel-heading">
                                Hướng dẫn thanh toán  <div class="pull-right"></div>
                            </div>
                            <div class="panel-body">
                               
                                    <div class="form-group">
                                        <div>
                                            *  Thanh toán khi nhận hàng: Bạn sẽ nhận hàng và thanh toán trực tiếp cho nhân viên vận chuyển. <br>
                                            *  Thanh toán qua chuyển khoản: Bạn sẽ chuyển đầy đủ số tiền của đơn hàng cho STK của Shop qua ngân hàng VietinBank, Chủ TK NGUYEN VAN THANH, chi nháng Hai Bà Trưng và Shop sẽ giao đầy đủ hàng cho bạn. <br>
                                            *  Thanh toán qua ví Momo: Bạn sẽ chuyển đầy đủ số tiền của đơn hàng cho số Momo 0342730001, chủ TK Nguyen Van Thanh, và Shop sẽ giao đầy đủ hàng cho bạn. <br>
                                            ***Lưu ý: Khi Chuyển khoản hoặc Thanh toán qua Momo các bạn nhớ note lại mã đơn hàng và số điện thoại người nhận để Shop xác nhận và gửi hàng. <br> 
                                            
                                        </div>   
                                    </div>
                                    




                            </div>
                        </div>
                        <!--REVIEW ORDER END-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                        <!--SHIPPING METHOD-->

                        <div class="panel panel-info">
                            <div class="panel-heading">Thông tin thanh toán</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12" ><strong>Tên người nhận:</strong></div>
                                    <div class="col-md-12">
                                        <input required type="text" name="name" class="form-control" placeholder="Tên người nhận" value="{{ get_data_user('web','name') }}" />
                                    </div>
                                    <div  class="col-md-12"><strong>Địa chỉ:</strong></div>
                                    <div class="col-md-12">
                                        <input required placeholder="Địa chỉ" type="text" name="address" class="form-control" value="{{ get_data_user('web','address') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div  class="col-md-12"><strong>Email:</strong></div>
                                    <div class="col-md-12">
                                        <input placeholder="email" required type="text" name="email" class="form-control" value="{{ get_data_user('web','email') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div  class="col-md-12"><strong>Số điện thoại:</strong></div>
                                    <div class="col-md-12">
                                        <input required placeholder="Số điện thoại nhận hàng" type="text" name="phone" class="form-control" value="{{ get_data_user('web','phone') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                    <div class="col-md-12">
                                        <textarea placeholder="Chú thích màu sản phẩm" required name="note" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Phương thức thanh toán:</label>
                                    <select name="type" id="" class="form-control">
                                        
                                        
                                                <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                                                <option value="Thanh toán qua chuyển khoản">Thanh toán qua chuyển khoản</option>
                                                <option value="Thanh toán qua ví Momo">Thanh toán qua ví Momo</option>
                                           
                                    </select>
                                    
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="checkbox" required="" style="size: 0px" name="total" value = "{{$totalMoney}}"> Xác nhận địa chỉ thanh toán <br> <br>
                                        <button type="submit" class="btn btn-success">Đặt hàng</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--SHIPPING METHOD END-->
                    </div>

                </form>
            </div>
            <div class="row cart-footer">

            </div>
        </div>
    </div>
@stop
