@extends('layouts.app')
@section('content')
    <style>
        .main-contact-area { margin-top: 20px}
    </style>
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
                            <li class="category3"><span>Bài viết</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    @if (isset($articles))
                        @foreach($articles as $article)
                            <div class="article" style="padding-bottom: 10px;margin-bottom: 10px;border-bottom: 1px solid #f2f2f2;display: flex">
                                <div class="article_avatar">
                                    <a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">
                                        <img src="{{ pare_url_file($article->a_avatar) }}" style="width: 350px;height: 200px" alt="">
                                    </a>
                                </div>
                                <div class="article_info" style="width: 80%;margin-left: 20px">
                                    <h2 style="font-size: 15px;"><a style="color: black" href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">{{ $article->a_name }}</a></h2>
                                    <p style="font-size: 14px">{{ $article->a_description }}</p>
                                    <p style="color: red"> ThanhBK, <span>{{ $article->created_at }}</span></p>
                                </div>
                            </div>
                        @endforeach
                        {!! $articles->links() !!}
                    @endif
                </div>
                <div class="col-sm-3">
                    <h5>Bài viết mới</h5>
                    <div class="list_article_hot">
                        @if (isset($articleNew))
                            @foreach($articleNew as $arHot)
                                <div class="article_hot_item">
                                    <div class="article_img">
                                        <a href="{{route('get.detail.article',[$arHot->a_slug, $arHot->id])}}">
                                            <img src="{{ pare_url_file($arHot->a_avatar) }}" alt="" style="width: 250px;height: 140px">
                                        </a>
                                    </div>
                                    <div class="article_info">
                                        <a href="{{route('get.detail.article',[$arHot->a_slug, $arHot->id])}}"><h4 style="font-size: 12px;margin-top: 12px;margin-bottom: 10px;color: black">{{ $arHot->a_name }}</h4></a>
                                        <p style="font-size: 12px">{{ $arHot->a_description }}...</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
