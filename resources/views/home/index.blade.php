@extends('layouts.app')
@section('content')
    <!-- main area start -->
    <div class="main-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- category menu start -->
                @include('components.category')
                <!-- category menu end -->
                    <!-- block category area start -->
                    <div class="block-category side-area">
                        <!-- featured block start -->
                        <!-- block title start -->
                        <div class="bar-title">
                            <div class="bar-ping"><img src="img/bar-ping.png" alt="" /></div>
                            <h2>Khuyến mãi</h2>
                        </div> <br>
                        <!-- block title end -->
                        <!-- block carousel start -->
                        <div class="block-carousel">
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a ><img src="/2.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a >Tặng tai nghe không dây</a></h3>
                                        <div class="cat-price">0 VNĐ <span class="old-price">50.000VNĐ</span></div>
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                        </div> <br><br>
                        <div class="block-carousel">
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a ><img src="img/1.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a >Tặng ốp lưng khi mua máy</a></h3>
                                        <div class="cat-price">0 VNĐ <span class="old-price">50.000VNĐ</span></div>
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                        </div>
                        <!-- block carousel end -->
                    </div>
                    <!-- block category area end -->
                    <!-- aboutthumb area start -->
                    <div class="block-category side-area">
                        <!-- featured block start -->
                        <!-- block title start -->
                        <br>
                        <div class="bar-title">
                            <div class="bar-ping"><img src="img/bar-ping.png" alt="" /></div>
                            <h2>Hot Sale 2020</h2>
                        </div>
                        <!-- block title end -->
                        <!-- block carousel start -->
                        @if(asset($productSale))
                            @foreach($productSale as $sale)
                        <div class="block-carousel">
                            <div class="block-content">
                                <!-- single block start -->
                                <div style="padding-top: 15px" class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="{{pare_url_file($sale->pro_avatar)}}" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="{{ route('get.detail.product',[$sale->pro_slug,$sale->id]) }}">{{$sale->pro_name}}</a></h3>
                                        <div class="cat-price">{{number_format($sale->pro_price*(100-$sale->pro_sale)/100,0)}} VNĐ <span class="old-price">{{number_format($sale->pro_price,0)}}VNĐ</span></div>
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                        </div> <br> <br>
                            @endforeach
                        @endif
                        <!-- block carousel end -->
                    </div>
                    <!-- aboutthumb area end -->
                    <!-- on sale area start -->
                    <!--  -->
                    <!-- on sale area end -->
                    <!-- latestpost area start -->

                    <!-- latestpost area end -->
                </div>
                <div class="col-md-9">
                    <!-- start home slider -->
                @include('components.slide')
                <!-- end home slider -->
                    <!-- unit banner area start -->
                    <!-- unit banner area end -->
                    <!-- product section start <-->
                    <br><br><br>
                    <div class="our-product-area new-product">
                        <div class="area-title">
                            <h2>Sản phẩm nổi bật</h2>
                        </div>
                        <!-- our-product area start -->
                       @include('components.hotproduct')
                        <!-- our-product area end -->
                    </div>
                    <!-- product section end -->
                    
                    <!-- product section start -->
                    <div class="our-product-area">
                        <!-- area title start -->
                        <div class="area-title">
                            <h2>Sản phẩm mới</h2>
                        </div>
                        @include('components.newproduct')
                        <!-- product section end -->


                        <!-- bai viet-->
                        @include('components.newArticle')
                    </div>
                    <div class="our-product-area new-product">
                        <div class="area-title">
                            <h2>Sản phẩm vừa xem</h2>
                        </div>
                        <!-- our-product area start -->
                       <div id="product_view"></div>
                        <!-- our-product area end -->
                    </div>
                    <!-- product section end -->

                </div>
            </div>
        </div>

    </div>
@stop
@section('script')


    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            let routeRenderProduct  = '{{ route('post.product.view') }}';
            checkRenderProduct = false;
            $(document).on( 'scroll', function(){
                if ($(window).scrollTop() > 150 && checkRenderProduct == false ) {

                    checkRenderProduct = true;
                    let products = localStorage.getItem('products');
                    products = $.parseJSON(products)
                    console.log(products);

                    if (products.length > 0 )
                    {
                        $.ajax({
                            url : routeRenderProduct,
                            method : "POST",
                            data  : { id : products},
                            success : function(result)
                            {
                                $("#product_view").html('').append(result.data)
                            }
                        });
                    }

                }
            });
        })
    </script>
@stop