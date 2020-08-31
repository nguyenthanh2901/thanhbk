<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="features-curosel">
            @if(asset($productNew))
                @foreach($productNew as $hot)
                    <!-- single-product start -->
                         <div class="col-lg-12 col-md-12">
                            <div class="single-product ex-pro">
                                <div class="product-img">
                                    @if ( $hot->pro_number == 0)
                                        <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 13px;">Tạm hết hàng</span>
                                    @endif
                                    @if ($hot->pro_sale)
                                        <span style="position: absolute;font-size:13px;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 1px 7px;color: white;right: 0">Giảm {{ $hot->pro_sale }}%</span>
                                    @endif
                                    <a href="{{ route('get.detail.product',[$hot->pro_slug,$hot->id]) }}">
                                        <img style="width: 250px; height: 220px" class="primary-image" src="{{pare_url_file($hot->pro_avatar)}}" alt="" />
                                    </a>
                                    <div class="action-zoom">
                                        <div class="add-to-cart">
                                            <a href="{{ route('get.detail.product',[$hot->pro_slug,$hot->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="action-buttons">
                                            <div class="add-to-links">
                                               
                                                <div class="compare-button">
                                                    <a href="{{route('add.shopping.cart',$hot->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                     @if ($hot->pro_sale)
                                        <span class="new-price" style="text-decoration: line-through;color: #666;font-weight: 500;">{{ number_format($hot->pro_price,0,',','.') }} đ</span>
                                        <span class="new-price">{{ number_format(round((100 - $hot->pro_sale) * $hot->pro_price / 100,0),0,',','.') }} đ</span>
                                    @else
                                        <span class="new-price">{{ number_format($hot->pro_price,0,',','.') }} đ</span>
                                    @endif
                                    <h2 class="product-name"><a href="{{ route('get.detail.product',[$hot->pro_slug,$hot->id]) }}">{{$hot->pro_name}}</a></h2>
                                    <p>{{$hot->pro_description}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- single-product end -->
                    @endforeach
                @endif
            </div>
        </div>


        <div class="row">
            <div class="features-curosel">
            @if(asset($productOld))
                @foreach($productOld as $hot)
                    <!-- single-product start -->
                         <div class="col-lg-12 col-md-12">
                            <div class="single-product ex-pro">
                                <div class="product-img">
                                    @if ( $hot->pro_number == 0)
                                        <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 13px;">Tạm hết hàng</span>
                                    @endif
                                    @if ($hot->pro_sale)
                                        <span style="position: absolute;font-size:13px;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 1px 7px;color: white;right: 0">Giảm {{ $hot->pro_sale }}%</span>
                                    @endif
                                    <a href="{{ route('get.detail.product',[$hot->pro_slug,$hot->id]) }}">
                                        <img style="width: 250px; height: 220px" class="primary-image" src="{{pare_url_file($hot->pro_avatar)}}" alt="" />
                                    </a>
                                    <div class="action-zoom">
                                        <div class="add-to-cart">
                                            <a href="{{ route('get.detail.product',[$hot->pro_slug,$hot->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="action-buttons">
                                            <div class="add-to-links">
                                               
                                                <div class="compare-button">
                                                    <a href="{{route('add.shopping.cart',$hot->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                     @if ($hot->pro_sale)
                                                                <span class="new-price" style="text-decoration: line-through;color: #666;font-weight: 500;">{{ number_format($hot->pro_price,0,',','.') }} đ</span>
                                                                <span class="new-price">{{ number_format(round((100 - $hot->pro_sale) * $hot->pro_price / 100,0),0,',','.') }} đ</span>
                                                            @else
                                                                <span class="new-price">{{ number_format($hot->pro_price,0,',','.') }} đ</span>
                                                            @endif
                                    <h2 class="product-name"><a href="{{ route('get.detail.product',[$hot->pro_slug,$hot->id]) }}">{{$hot->pro_name}}</a></h2>
                                    <p>{{$hot->pro_description}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- single-product end -->
                    @endforeach
                @endif
            </div>
        </div>

    </div>
</div>
