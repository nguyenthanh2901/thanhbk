@extends('layouts.app')
@section('content')
    <style>
        .product-tab-content
        {
            overflow: hidden;
        }

        .product-tab-content h2 { font-size: 24px !important;}
        .product-tab-content h3 { font-size: 20px !important;}
        .product-tab-content h4 { font-size: 18px !important;}

        .product-tab-content img {
            margin: 0 auto;
            text-align: center;
            max-width: 100%;
            display: block;
        }

        .list_start i:hover
        {
            cursor: pointer;
        }
        .list_text
        {
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background: #52b858;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 12px;
            border-radius: 2px;
            display: none;
        }

        .list_text:after
        {
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(82,184,88,0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }

        .list_start .rating_active,.pro-rating .active {
            color: #ff9705;
        }

    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="{{route('get.list.product',[$cateProduct->c_slug,$cateProduct->id])}}">{{ $cateProduct->c_name }}</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{ $productDetail->pro_name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-details-area" id="content_product" data-id="{{ $productDetail->id }}">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            
                                <div style="height:400px;width:380px;border-right: 2px solid rgb(247, 247, 247);" ><img id="zoom1" src="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" data-zoom-image="img/product-details/ex-big-1-1.jpg" alt="big-1" style="position: absolute;"></div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div style=" border-right: 2px solid rgb(247, 247, 247);border-bottom: 2px solid rgb(247, 247, 247);" class="product-content">
                                <h2 class="product-name"><a href="#">{{ $productDetail->pro_name }}</a></h2>
                                <div class="rating-price">
                                    <?php
                                    $ageDetail = 0;

                                    if ($productDetail->pro_total_rating)
                                    {
                                        $ageDetail  =  round($productDetail->pro_total_number / $productDetail->pro_total_rating,2);
                                    }
                                    ?>
                                    <div class="pro-rating">
                                        @for($i =1 ; $i<=5 ;$i ++)
                                            <a href="#"><i class="fa fa-star {{ $i <= $ageDetail ? 'active' : '' }}"></i></a>
                                        @endfor
                                    </div>
                                    <div class="price-boxes">
                                        @if ($productDetail->pro_sale)
                                            <span class="new-price" style="text-decoration: line-through;color: #666;font-weight: 400;font-size: 18px">{{ number_format($productDetail->pro_price,0,',','.') }} đ</span>
                                            <span style="font-size: 20px" class="new-price">{{ number_format(round((100 - $productDetail->pro_sale) * $productDetail->pro_price / 100,0),0,',','.') }} đ</span>
                                        @else
                                            <span style="font-size: 20px" class="new-price">{{ number_format($productDetail->pro_price,0,',','.') }} đ</span>
                                        @endif
                                    </div>
                                        <div style="color: red">Màu sắc sẵn có:  @foreach (explode(",", $productDetail->pro_color) as $pro)
                                        <a href="" class="btn btn-default btn-sm">{{$pro}}</a>
                                        @endforeach</div>
                                    <div>
                                       
                                    </div>
                                    <br>
                                    <span style="color: red; padding-top: 20px">Dung lượng:</span> {{ $productDetail->pro_memory }}GB

                                </div>
                                <div class="product-desc">
                                    <span style="color: red; padding-top: 20px">Mô tả:</span> {{ $productDetail->pro_description_ceo }}
                                </div><br>
                                <div class="product-desc">
                                    <span style="color: red; padding-top: 20px">Bảo hành:</span> Bảo hành chính hãng 12 tháng
                                </div>
                                <br>

                              
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="btn btn-success">
                                            <a style="color: whitesmoke"  href="{{ route('add.shopping.cart',$productDetail->id) }}">CHỌN MUA</a>
                                        </div>
                                    </div>
                                </div>
                              

                                <div class="singl-share">
                                    <a href="#"><img src="img/single-share.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="col-md-3 col-sm-3 col-xs-12" style=" border-right: 2px solid rgb(247, 247, 247);width: 250px;height: 400px; "><br><br><br><br>
                      <div class="product-desc">
                        <span style="color: red; padding-top: 20px">Chính sách mua hàng:</span><br>
                    </div>
                    <aside class="sidebar-content">
                            <ul>
                                <li><a style="color: black;" class="fa fa-refresh  " href=""> Sản phẩm chính hãng </a></li>
                                <li><a style="color: black;" class="fa fa-life-ring  " href=" "> Bảo hành chính hãng 1 năm </a></li>
                                <li><a style="color: black;" class="fa fa-life-ring  " href=""> Hỗ trợ trả góp 0% </a></li>
                                <li><a style="color: black;" class="fa fa-truck " href=" "> Vận chuyển miễn phí </a></li>
                            </ul>
                        </aside>
                    <div class="product-desc">
                        <span style="color: red; padding-top: 20px">Khuyễn mãi:</span> Tặng ốp chống sốc và tai nghe không dây
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a  data-toggle="tab">Chi tiết sản phẩm</a></li>
                        <li class=""><a  data-toggle="tab"> Đánh giá</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                {!! $productDetail->pro_content !!}
                            </div>
                        </div>

                        <div class="component_rating" style="margin-bottom: 20px">
                            <h3>Đánh giá sản phẩm</h3>
                            <div class="component_rating_content" style="display: flex;align-items: center;border-radius: 5px;border:1px solid #dedede">
                                <div class="rating_item" style="width: 20%;position: relative">
                                    <span class="fa fa-star" style="font-size: 100px;display: block;color: #ff9705;margin: 0 auto;text-align: center;"></span><b style="    position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;font-size: 20px;">{{ $ageDetail }}</b>
                                </div>
                                <div class="list_rating" style="width: 60%;padding: 20px">
                                    @foreach($arrayRatings as $key => $arrayRating)
                                        <?php

                                        $itemAge = round(($arrayRating['total'] / $productDetail->pro_total_rating)  * 100,0);
                                        ?>
                                        <div class="item_rating" style="display: flex;align-items: center">

                                            <div style="width: 10%;font-size: 14px">
                                                {{ $key }} <span class="fa fa-star"></span>
                                            </div>
                                            <div style="width: 70%;margin: 0 20px;">
                                                <span style="width: 100%;height: 8px;display: block;border: 1px solid #dedede;border-radius: 5px;background-color: #dedede">
                                                    <b style="width: {{ $itemAge }}%;background-color: #f25800;display: block;border-radius: 5px;height: 100%"></b>
                                                </span>
                                            </div>
                                            <div style="width: 20%">
                                                <a href="" style=""> {{ $arrayRating['total'] }} đánh giá ({{ $itemAge }} %) </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div style="width: 20%">
                                    @if (get_data_user('web'))
                                        <a href="#" class="js_rating_action" style="width: 200px;background: #288ad6;padding: 10px;color: white;border-radius: 5px;">Gủi đánh giá của bạn</a>
                                    @else
                                        <a href="{{ route('get.login') }}"  style="width: 200px;background: #288ad6;padding: 10px;color: white;border-radius: 5px;">Đăng nhập</a>
                                    @endif
                                </div>
                            </div>
                            <?php
                            $listRatingText  = [
                                1 => 'Không thích',
                                2 => 'Tạm được',
                                3 => 'Bình thường',
                                4 => 'Rất tốt',
                                5 => 'Tuyệt vời quá',
                            ];
                            ?>
                            <div class="form_rating hide">
                                <div style="display: flex;margin-top: 15px;font-size: 15px">
                                    <p style="margin-bottom: 0">Chọn đánh giá của bạn</p>
                                    <span style="margin: 0 15px" class="list_start">
                                        @for($i = 1; $i <= 5 ; $i ++)
                                            <i class="fa fa-star" data-key="{{ $i }}"></i>
                                        @endfor
                                    </span>
                                    <span class="list_text"></span>
                                    <input type="hidden" value="" class="number_rating">
                                </div>
                                <div style="margin-top: 15px">
                                    <textarea name="" class="form-control" id="ra_content" cols="30" rows="3"></textarea>
                                </div>

                                <div style="margin-top: 15px">
                                    <a href="{{ route('post.rating.product',$productDetail) }}" class="js_rating_product" style="width: 200px;background: #288ad6;padding: 5px 10px;color: white;border-radius: 5px;">Gửi đánh giá</a>
                                </div>
                            </div>
                        </div>
                        <div class="component_list_rating">
                            @if ( isset($ratings))
                                @foreach($ratings as $rating)
                                    <div class="rating_item" style="margin: 10px 0">
                                        <div>
                                            <span style="color: #333;font-weight: bold;">Người đánh giá: {{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</span>
                                        </div>
                                        <p style="margin-bottom: 0">
                                                <span class="pro-rating">
                                                    @for($i =1 ; $i<=5 ;$i ++)
                                                        <i class="fa fa-star {{ $i<= $rating->ra_number ? 'active' : '' }}"></i>
                                                    @endfor
                                                </span>
                                            <span>{{ $rating->ra_content }}</span>
                                        </p>
                                        <div>
                                            <span><i class="fa fa-clock-o"></i> {{ $rating->created_at }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function(){
            let listStart = $(".list_start .fa");

            listRatingText  = {
                1 : 'Không thích',
                2 : 'Tạm được',
                3 : 'Bình thường',
                4 : 'Rất tốt',
                5 : 'Tuyệt vời quá',
            }

            listStart.mouseover( function(){
                let $this = $(this);
                let number = $this.attr('data-key');
                listStart.removeClass('rating_active')

                $(".number_rating").val(number);
                $.each(listStart, function(key,value){
                    if ( key + 1 <= number)
                    {
                        $(this).addClass('rating_active')
                    }
                });

                $(".list_text").text('').text(listRatingText[number]).show();

            });

            $(".js_rating_action").click(function (event) {
                event.preventDefault();

                if ( $(".form_rating").hasClass('hide'))
                {
                    $(".form_rating").addClass('active').removeClass('hide')
                }else
                {
                    $(".form_rating").addClass('hide').removeClass('active')
                }
            })

            $(".js_rating_product").click(function(e){
                event.preventDefault();
                let content = $("#ra_content").val();
                let number  = $(".number_rating").val();
                let url = $(this).attr('href');

                if ( content && number)
                {
                    $.ajax({
                        url: url,
                        type : 'POST',
                        data : {
                            number : number,
                            r_content : content
                        }
                    }).done(function(result) {
                        if (result.code == 1)
                        {
                            alert("GỦi đánh giá thành công");
                            location.reload();
                        }
                    });
                }
            });


            //  luu id san pham vao storage
            let idProduct = $("#content_product").attr('data-id');

            // lấy giá trị storage
            let products = localStorage.getItem('products');

            if (products == null)
            {
                arrayProduct = new Array();
                arrayProduct.push(idProduct)
                localStorage.setItem('products',JSON.stringify(arrayProduct))

            }else
            {
                // chuyển về mảng
                products = $.parseJSON(products)

                if ( products.indexOf(idProduct) == -1)
                {
                    products.push(idProduct);
                    localStorage.setItem('products',JSON.stringify(products))
                }
            }
        });
    </script>
@stop
