<div class="slider-area hm-1">
    <!-- slider -->
    <div class="bend niceties preview-2">
        <div id="ensign-nivoslider-2" class="slides">

            @if(isset($slides))
            @foreach($slides as $slide)
            <img src="{{ pare_url_file($slide->s_avatar) }}" alt="" title="#slider-direction-1"  />
            @endforeach
            @endif
        </div>
        <!-- direction 1 -->
        <div id="slider-direction-1" class="t-cn slider-direction">
            <div class="slider-progress"></div>
        </div>
        <!-- direction 2 -->
        <div id="slider-direction-2" class="slider-direction">
            <div class="slider-progress"></div>
        </div>
    </div> <br><br>
    <div style="margin: 0; padding: 0; width: 100%;padding-top: 20px; font-size: 15px" class="main_menu col-md-9">
        <div class="main-service hidden-sm hidden-xs">
            <div class="row">
                <div  class="col-md-3">
                    <p><a style="color: red" href=""><i class="fa fa-refresh"></i> Bảo hành 1 năm 1 đổi 1</a></p>
                </div>
                <div class="col-md-3">
                    <p><a style="color: red" href=""><i class="fa fa-life-ring"></i> Hỗ trợ trả góp 0%</a></p>
                </div>
                <div class="col-md-3">
                    <p><a style="color: red" href=""><i class="fa fa-check"></i> Sản phẩm chính hãng</a></p>
                </div>
                <div class="col-md-3">
                    <p><a style="color: red" href=""><i class="fa fa-truck"></i> Vận chuyển miễn phí</a></p>
                </div>

            </div>
        </div>
    <!-- slider end-->
</div>
