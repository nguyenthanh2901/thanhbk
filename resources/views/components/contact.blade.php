@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{route('home')}}">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Liên hệ</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-us-area">
                        <!-- google-map-area start -->
                        <div class="google-map-area">
                            <!--  Map Section -->
                            <div id="contacts" class="map-area">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7449.3926335698825!2d105.845341!3d21.004807!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2sus!4v1587619378101!5m2!1svi!2sus" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <!-- google-map-area end -->
                        <!-- contact us form start -->
                            <div class="info-footer">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-4">
                                            <div class="info-fcontainer">
                                                <div class="infof-icon">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <div class="infof-content">
                                                    <h3>Địa chỉ</h3>
                                                    <p>Đại học Bách khoa Hà Nội</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <div class="info-fcontainer">
                                                <div class="infof-icon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <div class="infof-content">
                                                    <h3>Số điện thoại</h3>
                                                    <p>034.273.0001</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <div class="info-fcontainer">
                                                <div class="infof-icon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <div class="infof-content">
                                                    <h3>Email Support</h3>
                                                    <p>nguyenthanh2901hust@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 hidden-sm">
                                            <div class="info-fcontainer">
                                                <div class="infof-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <div class="infof-content">
                                                    <h3>Giờ làm việc</h3>
                                                    <p>8:00 am - 22:00 pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert-danger"  style="padding-top: 20px;padding-left: 120px; padding-bottom: 20px "><h3 >BẠN CÓ THỂ LIỆN HỆ VỚI CHÚNG TÔI QUA SỐ ĐIỆN THOẠI, EMAIL HOẶC ĐIỀN VÀO FORM PHÍA DƯỚI. CHÚNG TÔI SẼ LIÊN HỆ VỚI BẠN NHANH NHẤT CÓ THỂ.</h3></div>
                            </div>
                        <div class="contact-us-form">
                            <div class="contact-form">
                                <span class="legend">Mời bạn điền thông tin liên hệ</span>
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-top">
                                        <div class="form-group col-sm-6 col-md-6 ">
                                            <label>Họ và tên <sup>*</sup></label>
                                            <input type="text" name="c_name" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 ">
                                            <label>Số điện thoại <sup>*</sup></label>
                                            <input type="text" name="c_phone" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 ">
                                            <label>Email <sup>*</sup></label>
                                            <input type="email" name="c_email" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 ">
                                            <label>Tiêu đề <sup>*</sup></label>
                                            <input type="text" name="c_title" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 ">
                                            <label>Nội dung <sup>*</sup></label>
                                            <textarea class="yourmessage" name="c_content" required></textarea>
                                        </div>
                                    </div>
                                    <div class="submit-form form-group col-sm-12 submit-review">
                                        <button type="submit" class="btn-success">Gửi thông tin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- contact us form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
