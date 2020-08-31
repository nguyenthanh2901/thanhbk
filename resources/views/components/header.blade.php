<header class="short-stor">
    <div class="container-fluid">
        <div class="row">
            <!-- logo start -->
            <div class="col-md-3 col-sm-12 text-center nopadding-right">
                <div class="top-logo">
                    <a style="padding-left: 180px; " href="/"><img style="width: 40%; height: 50% " src="{{ asset('images/logoshop.GIF') }}" alt="" /></a>
                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-6 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="/" title="Trang chủ">Trang chủ</a></li>
                            <li class="expand">
                                <a href="{{route('get.product.list')}}">Sản phẩm</a>
                                <ul class="restrain sub-menu">
                                    @if (isset($categories))
                                        @foreach($categories as $cate)
                                            <li><a href="{{route('get.list.product',[$cate->c_slug, $cate->id])}}">{{ $cate->c_name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="expand">
                                <a href="{{route('get.list.article')}}" title="Tin tức">Tin tức</a>
                            </li>
                            <li class="expand"><a href="{{route('get.detail.article',['gioi-thieu-ve-cua-hang','13'])}}">Giới thiệu</a></li>
                            <li class="expand"><a href="{{route('get.contact')}}">Liên hệ</a></li>

                        </ul>
                    </nav>
                </div>
                <!-- mobile menu start -->
                <!-- mobile menu end -->
            </div>
            <!-- mainmenu area end -->
            <!-- top details area start -->
            <div class="col-md-3 col-sm-12 nopadding-left">
                <div class="top-detail">
                    <div class="disflow">
                        <div class="circle-shopping expand">
                            <div class="shopping-carts text-right">
                                <div class="cart-toggler">
                                    <a href="{{route('get.list.shopping.cart')}}"><i class="icon-bag"></i></a>
                                    <a href="{{route('get.list.shopping.cart')}}"><span class="cart-quantity">{{ \Cart::count() }}</span></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- addcart top start -->
                    <!-- search divition start -->
                    <div class="disflow">
                        <div class="header-search expand">
                            <div class="search-icon fa fa-search"></div>
                            <div class="product-search restrain">
                                <div class="container nopadding-right">
                                    <form action="{{route('get.product.list')}}" id="searchform" method="get">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control"  maxlength="128" placeholder="Tìm kiếm sản phẩm...">
                                            <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- search divition end -->
                    <div class="disflow">
                        <div class="expand dropps-menu">
                            <a href="#"><i class="fa fa-align-right"></i></a>
                            <ul class="restrain language" style="width: 200px">
                                @if (Auth::check())
                                    <li><a href="{{route('user.dashboard')}}" title="Quản lý tổng quan">Quản lý</a></li>
                                    <li><a href="#">Giỏ hàng</a></li>
                                    <li><a href="{{route('get.logout.user')}}">Thoát</a></li>
                                @else
                                    <li><a href="{{route('get.register')}}">Đăng ký</a></li>
                                    <li><a href="{{route('get.login')}}">Đăng nhập</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- top details area end -->
        </div>
    </div>
</header>
