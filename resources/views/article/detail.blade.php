@extends('layouts.app')
@section('content')
    <style>
        .article_content h2 { font-size: 1.4rem}
        .article_content h1 { font-size: 18px !important;line-height: 24px}
        .article_content  { font-family:  Roboto, sans-serif;}
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
                            <li class="home">
                                <a href="{{ route('get.list.article') }}" title="Bài viết">Bài viết</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{ $articleDetail->a_name }}</span></li>
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
                    <div class="article_content" style="margin-bottom: 20px">
                        <h1>{{ $articleDetail->a_name }}</h1>
                        <p style="font-weight: 500;color: #333">{{ $articleDetail->a_description }}</p>
                        <div>
                            {!! $articleDetail->a_content !!}
                        </div>
                    </div>
                    <h4>Bài viết khác</h4>
                    @if (isset($articles))
                        @foreach($articles as $article)
                            <div class="article" style="padding-bottom: 10px;margin-bottom: 10px;border-bottom: 1px solid #f2f2f2;display: flex">
                                <div class="article_avatar">
                                    <a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">
                                        <img src="{{ pare_url_file($article->a_avatar) }}" style="max-height: 100px" alt="">
                                    </a>
                                </div>
                                <div class="article_info" style="width: 80%;margin-left: 20px">
                                    <h2 style="font-size: 14px"><a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">{{ $article->a_name }}</a></h2>
                                    <p style="font-size: 13px">{{ $article->a_description }}</p>
                                    <p style="color: red"> ThanhBK, <span>{{ $article->created_at }}</span></p>
                                </div>
                            </div>
                        @endforeach

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
