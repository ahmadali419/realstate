@extends('client.layouts.master')
@section('title','About')
@section('content')
<div class="sub-banner">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>About Us</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- About city estate start -->
<div class="about-city-estate">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="properties-detail-slider simple-slider pds-2">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                       
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ isset($settings['about_image']) ?  asset('admin-asset/images/settings/' . $settings['about_image'])  : '' }}" class="d-block w-100 img-fluid" alt="photo">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 align-self-center">
                <div class="about-text">
                    <h3>{{ isset($settings['about_title']) ? $settings['about_title'] : ''   }}</h3>
                    <p>
                        {{ isset($settings['about_description']) ? $settings['about_description'] : ''   }}
                    </p>

                   

                </div>
            </div>
        </div>
    </div>
</div>
<!-- About city estate end -->

<!-- Agent section start -->
<div class="agent-section content-area comon-slick">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Agent</h1>
        </div>
        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="item slide-box">
                <div class="agent-1">
                    <div class="member-thumb">
                        <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="agent-1" class="img-fluid w-100">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Michelle Nelson</a>
                            </h4>
                            <p class="member-designation">Support Manager</p>
                            <div class="social-list clearfix">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="agent-1" class="img-fluid w-100 h-100">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Michelle Nelson</a>
                            </h4>
                            <p class="member-designation">Support Manager</p>
                        </div>
                        <div class="member-socials">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook "></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="rss-bg"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box">
                <div class="agent-1">
                    <div class="member-thumb">
                        <img src="{{ asset('assets/img/avatar/avatar-2.png') }}" alt="agent-1" class="img-fluid w-100 h-100">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Karen Paran</a>
                            </h4>
                            <p class="member-designation">Web Developer</p>
                            <div class="social-list clearfix">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="{{ asset('assets/img/avatar/avatar-2.png') }}" alt="agent-1" class="img-fluid w-100 h-100">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Karen Paran</a>
                            </h4>
                            <p class="member-designation">Web Developer</p>
                        </div>
                        <div class="member-socials">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook "></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="rss-bg"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box">
                <div class="agent-1">
                    <div class="member-thumb">
                        <img src="{{ asset('assets/img/avatar/avatar-3.png') }}" alt="agent-1" class="img-fluid w-100">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Karen Paran</a>
                            </h4>
                            <p class="member-designation">Office Manager</p>
                            <div class="social-list clearfix">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="{{ asset('assets/img/avatar/avatar-3.png') }}" alt="agent-1" class="img-fluid w-100 h-100">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Karen Paran</a>
                            </h4>
                            <p class="member-designation">Office Manager</p>
                        </div>
                        <div class="member-socials">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook "></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="rss-bg"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box">
                <div class="agent-1">
                    <div class="member-thumb">
                        <img src="{{ asset('assets/img/avatar/avatar-4.png') }}" alt="team-1" class="img-fluid">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Martin Smith</a>
                            </h4>
                            <p class="member-designation">Creative Director</p>
                            <div class="social-list clearfix">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="{{ asset('assets/img/avatar/avatar-4.png') }}" alt="team-1" class="img-fluid h-100">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Martin Smith</a>
                            </h4>
                            <p class="member-designation">Creative Director</p>
                        </div>
                        <div class="member-socials">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook "></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="rss-bg"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box">
                <div class="agent-1">
                    <div class="member-thumb">
                        <img src="{{ asset('assets/img/avatar/avatar-3.png') }}" alt="team-1" class="img-fluid">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Karen Paran</a>
                            </h4>
                            <p class="member-designation">Office Manager</p>
                            <div class="social-list clearfix">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="{{ asset('assets/img/avatar/avatar-3.png') }}" alt="team-1" class="img-fluid h-100">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Martin Smith</a>
                            </h4>
                            <p class="member-designation">Creative Director</p>
                        </div>
                        <div class="member-socials">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook "></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="rss-bg"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Agent section end -->

<!-- Counters 3 strat -->
<div class="counters-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 align-self-center">
                <div class="sec-title-three">
                    <div class="main-title main-title-5 mb-0">
                        <h1>More than 10 Years of Experience</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <div class="counters-3-inner">
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-tag"></i>
                        <div class="detail">
                            <h1 class="counter">967</h1>
                            <p>Listings For Sale</p>
                        </div>
                    </div>
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-symbol-1"></i>
                        <div class="detail">
                            <h1 class="counter">967</h1>
                            <p>Listings For Rent</p>
                        </div>
                    </div>
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-people"></i>
                        <div class="detail">
                            <h1 class="counter">396</h1>
                            <p>Agents</p>
                        </div>
                    </div>
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-people-1"></i>
                        <div class="detail">
                            <h1 class="counter">177</h1>
                            <p>Brokers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters 3 end -->

<div class="clearfix"></div>
<!-- Testimonials 2 -->
<div class="testimonials-2 comon-slick">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Testimonials</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    @foreach ($testimonials as $testimonial)
                    <div class="item slide-box">
                        <div class="testimonials-box">
                            <div class="detail clearfix">
                                <P><i class="fa fa-quote-left"></i> {{ $testimonial->description }} <i class="fa fa-quote-right"></i></P>
                                <div class="user-info d-flex">
                                    <a class="pr-3" href="#">
                                        <img src="{{ isset($testimonial->image) ?  asset('admin-asset/images/testimonial_images/' . $testimonial->image)  : '' }}" alt="user" class="flex-shrink-0 me-3">
                                    </a>
                                    <div class="detail align-self-center">
                                        <h5>
                                            <a href="#">{{ $testimonial->name }}</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach
                    {{-- <div class="item slide-box">
                        <div class="testimonials-box">
                            <div class="detail clearfix">
                                <P><i class="fa fa-quote-left"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when unknown. <i class="fa fa-quote-right"></i></P>
                                <div class="user-info d-flex">
                                    <a class="pr-3" href="#">
                                        <img src="{{ asset('assets/img/avatar/avatar-2.jpg') }}" alt="user" class="flex-shrink-0 me-3">
                                    </a>
                                    <div class="detail align-self-center">
                                        <h5>
                                            <a href="#">Michelle Nelson</a>
                                        </h5>
                                        <p>Creative Director</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item slide-box">
                        <div class="testimonials-box">
                            <div class="detail clearfix">
                                <P><i class="fa fa-quote-left"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when unknown. <i class="fa fa-quote-right"></i></P>
                                <div class="user-info d-flex">
                                    <a class="pr-3" href="#">
                                        <img src="img/avatar/avatar-1.jpg" alt="user" class="flex-shrink-0 me-3">
                                    </a>
                                    <div class="detail align-self-center">
                                        <h5>
                                            <a href="#">Auro Navanth</a>
                                        </h5>
                                        <p>Web Designer, Uk</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial 2 end -->
<div class="clearfix"></div>

<!-- Intro section start -->
<div class="intro-section">
    <div class="intro-section-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-7 col-sm-12">
                    <h3>Looking To Sell Or Rent Your Property?</h3>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12">
                    <a class="btn-2 btn-white" href="contact.html">
                        <span>Get in Touch</span> <i class="arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection