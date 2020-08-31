@extends('layouts.app')
@section('content')
    <style>
        .sidebar-content .active
        {
            color: black;
        }
        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
    </style>
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            @if (isset($cateProduct->c_name))
                                <li class="category3"><span>{{ $cateProduct->c_name }}</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- shop-with-sidebar Start -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <!-- left sidebar start -->
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <br><br> <div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div> 
                                <h2>Khoảng giá</h2>
                            </div>
                        </aside>
                        <aside class="sidebar-content">
                            <ul>
                                <li><a style="color: white;font-size: 13px;font-weight: 300" class="{{ Request::get('price') == 1 ? 'active' : '' }} btn btn-success btn-sm" href="{{ request()->fullUrlWithQuery(['price' => 1]) }}">Dưới 1.000.000 VNĐ </a></li>
                                <li><a style="color: white;font-size: 13px;font-weight: 300" class="{{ Request::get('price') == 2 ? 'active' : '' }} btn btn-success btn-sm" href="{{  request()->fullUrlWithQuery(['price' => 2]) }} "> 1.000.000 - 5.000.000 VNĐ </a></li>
                                <li><a style="color: white;font-size: 13px;font-weight: 300" class="{{ Request::get('price') == 3 ? 'active' : '' }} btn btn-success btn-sm" href="{{  request()->fullUrlWithQuery(['price' => 3]) }}"> 5.000.000-10.000.000 VNĐ </a></li>
                                <li><a style="color: white;font-size: 13px;font-weight: 300" class="{{ Request::get('price') == 4 ? 'active' : '' }} btn btn-success btn-sm" href="{{  request()->fullUrlWithQuery(['price' => 4]) }} "> Trên 10.000.000 VNĐ </a></li>
                            </ul>
                        </aside>

                        <aside class="widge-topbar">
                            <div class="bar-title"> <br><br><br><br><br><br><br><br><br>
                                <div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
                                <h2>Chính sách</h2>
                            </aside>
                        <aside class="sidebar-content">
                            <ul>
                                <li><a style="color: white;font-size: 15px;font-weight: 300" class="fa fa-refresh  btn btn-success btn-sm" href=""> Sản phẩm chính hãng </a></li>
                                <li><a style="color: white;font-size: 15px;font-weight: 300" class="fa fa-life-ring  btn btn-success btn-sm" href=" "> Bảo hành 1 năm 1 đổi 1 </a></li>
                                <li><a style="color: white;font-size: 15px;font-weight: 300" class="fa fa-life-ring  btn btn-success btn-sm" href=""> Hỗ trợ trả góp 0% </a></li>
                                <li><a style="color: white;font-size: 15px;font-weight: 300" class="fa fa-truck btn btn-success btn-sm" href=" "> Vận chuyển miễn phí </a></li>
                            </ul>
                        </aside>
                        </aside>
                    </div>
                </div>
                <!-- left sidebar end -->
                <!-- right sidebar start -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- shop toolbar start -->
                    <div class="shop-content-area">
                        <div class="shop-toolbar">
                            <div class="col-xs-12 nopadding-left ">
                                <form class="tree-most" id="form_order" method="get">
                                    <div class="orderby-wrapper pull-right">
                                        <label style="font-size: 15px;color: black">Sắp xếp</label>
                                        <select name="orderby" class="orderby" style="font-size: 15px;color: black">
                                            <option {{ Request::get('orderby') == "default" || !Request::get('orderby') ? "selected='selected'" : "" }} value="default" selected="selected">Mặc định</option>
                                            <option {{ Request::get('orderby') == "desc" ? "selected='selected'" : "" }} value="desc">Mới nhất</option>
                                            <option {{ Request::get('orderby') == "asc" ? "selected='selected'" : "" }} value="asc">Cũ nhất</option>
                                            <option {{ Request::get('orderby') == "price_max" ? "selected='selected'" : "" }} value="price_max">Giá tăng dần</option>
                                            <option {{ Request::get('orderby') == "price_min" ? "selected='selected'" : "" }} value="price_min">Giá giảm dần</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                                <div class="filter-panel">
                                    <a style="font-weight: 300; font-size: 13px; color: white;padding:3px 10px" href="{{route('get.product.list')}}" class="btn btn-success btn-sm">TẤT CẢ</a>

                                @if(asset($categories))
                                        @foreach($categories as $cate)
                                    <a style="font-weight: 300; font-size: 13px; color: white;padding:3px 10px" href="{{route('get.list.product',[$cate->c_slug, $cate->id])}}" class="btn btn-success btn-sm">{{$cate->c_name}}</a>
                                        @endforeach
                                    @endif
                                </div>
                        </div>
                    </div>
                    <!-- shop toolbar end -->
                    <!-- product-row start -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="shop-grid-tab">
                            <div class="row">
                                <div class="shop-product-tab first-sale">
                                    @foreach($products as $product)
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <div class="two-product">
                                                <!-- single-product start -->
                                                <div class="single-product">
                                                    {{--<span class="sale-text">Sale</span>--}}

                                                    <div class="product-img">
                                                        @if ( $product->pro_number == 0)
                                                            <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 13px;">Tạm hết hàng</span>
                                                        @endif
                                                        @if ($product->pro_sale)
                                                            <span style="position: absolute;font-size:13px;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 1px 7px;color: white;right: 0">GIẢM {{ $product->pro_sale }}%</span>
                                                        @endif
                                                        <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
                                                            <img style="width: 200px;height: 220px" class="primary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" />
                                                        </a>
                                                        <div class="action-zoom">
                                                            <div class="add-to-cart">
                                                                <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="actions">
                                                            <div class="action-buttons">
                                                                <div class="add-to-links">
                                                                    <div class="compare-button">
                                                                        <a href="{{ route('add.shopping.cart',$product->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="price-box">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        @if ($product->pro_sale)
                                                                <span class="new-price" style="text-decoration: line-through;color: #666;font-weight: 500;">{{ number_format($product->pro_price,0,',','.') }} đ</span>
                                                                <span class="new-price">{{ number_format(round((100 - $product->pro_sale) * $product->pro_price / 100,0),0,',','.') }} đ</span>
                                                            @else
                                                                <span class="new-price">{{ number_format($product->pro_price,0,',','.') }} đ</span>
                                                            @endif
                                                        <h2 class="product-name"><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name }}</a></h2>
                                                        <p>{{ $product->pro_description }}</p>
                                                    </div>
                                                </div> <br><br>
                                                <!-- single-product end -->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- list view -->
                        <!-- shop toolbar start -->
                        <div class="shop-content-bottom">
                            <div class="shop-toolbar btn-tlbr">
                                <div class="col-md-12 col-xs-6 text-center">
                                    <div class="pages">
                                        {!! $products->appends($query)->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop toolbar end -->
                    </div>
                </div>
                <!-- right sidebar end -->
            </div>
        </div>
    </div>
    <!-- shop-with-sidebar end -->
    <!-- Brand Logo Area Start -->
@stop


@section('script')
    <script>
        $(function () {
            $('.orderby').change(function () {
                $("#form_order").submit();
            })
        })
    </script>
@stop
