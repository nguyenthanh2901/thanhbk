<div class="area-title">
    <h2>Bài viết mới</h2>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="features-curosel">
            @if(asset($articleNew))
                @foreach($articleNew as $artnew)
                    <!-- single-product start -->
                        <div class="col-lg-12 col-md-12">
                            <div class="single-product ex-pro">
                                <div class="product-img">
                                    <a href="{{route('get.detail.article',[$artnew->a_slug,$artnew->id])}}">
                                        <img style="width: 250px; height: 220px" class="primary-image" src="{{pare_url_file($artnew->a_avatar)}}" alt="" />
                                    </a>
                                    <div class="action-zoom">
                                        <div class="">
                                        </div>
                                    </div>
                                    <div class="actions">

                                    </div>
                                </div>
                                <div class="product-content">
                                    <h2 class="product-name"><a href="{{route('get.detail.article',[$artnew->a_slug,$artnew->id])}}">{{$artnew->a_name}}</a></h2>
                                    <p><a href="{{route('get.detail.article',[$artnew->a_slug,$artnew->id])}}">{{$artnew->a_description}}...</a></p>
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
