@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Đăng ký</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-6">
                    <div class="customer-login my-account">
                        <form method="post" class="login" action="">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng ký</h2>
                                <p class="form-row form-row-wide">
                                    <label for="username">Họ tên <span class="">*</span></label>
                                    <input type="text" class="input-text" name="name" id="username" value="">
                                    @if($errors->has('name'))
                                    <div class="error-text">
                                        {{$errors->first('name')}}
                                    </div>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="username">Email <span class="">*</span></label>
                                    <input type="text" class="input-text" name="email" id="username" value="">
                                    @if($errors->has('email'))
                                    <div class="error-text">
                                        {{$errors->first('email')}}
                                    </div>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="password">Password <span class="required">*</span></label>
                                    <input class="input-text" type="password" name="password" id="password">
                                    @if($errors->has('password'))
                                    <div class="error-text">
                                        {{$errors->first('password')}}
                                    </div>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="username">Số điện thoại <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="phone" id="username" value="">
                                    @if($errors->has('phone'))
                                    <div class="error-text">
                                        {{$errors->first('phone')}}
                                    </div>
                                    @endif
                                </p>
                            </div>
                            <div class="form-action">
                                <p class="lost_password"> <a href="{{route('get.reset.password')}}">Quên mật khẩu?</a></p>
                                <div class="actions-log">
                                    <input type="submit" class="button" name="login" value="Đăng ký">
                                </div>
                                <label for="rememberme" class="inline">
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Lưu mật khẩu </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
