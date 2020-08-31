<div class="left-category-menu">
    <div class="left-product-cat">
        <div class="category-heading">
            <h2>Loại sản phẩm</h2>
        </div>
        <!-- category-menu-list start -->
        <div class="category-menu-list" style="display: block;">
            <ul>
                @if (isset($categories))
                    @foreach($categories as $cate)
                        <li><a href="{{route('get.list.product',[$cate->c_slug, $cate->id])}}">{{ $cate->c_name }}</a></li>
                    @endforeach
                @endif

            </ul>
        </div>
        <!-- category-menu-list end -->
    </div>
</div>
