@extends('client.layouts.master')
@section('title','Home')
@section('content')

<!-- Banner start -->
<div class="banner text-center" id="banner2">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($slides as $key => $slide)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : ''}}"  aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($slides as $key => $slide)
                <div class="carousel-item item-bg{{ $key === 0 ? ' active' : '' }}">
                    <img class="d-block w-100 h-100" src="{{ 'admin-asset/images/slider_images/' . $slide->image }}" alt="banner-photo">
                    <div class="carousel-caption banner-slider-inner d-flex h-100">
                        <div class="banner-content container align-self-center text-center">
                            <h1>{{ $slide->name }}</h1>
                            <p>{{ $slide->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Banner end -->

<!-- Search area start -->
<div class="search-area">
    <div class="container">
        <div class="search-area-inner">
            <div class="search-contents ">
                <form method="GET">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="area from">
                                    <option>Area From</option>
                                    <option>1000</option>
                                    <option>800</option>
                                    <option>600</option>
                                    <option>400</option>
                                    <option>200</option>
                                    <option>100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="property status">
                                    <option>Property Status</option>
                                    <option>For Sale</option>
                                    <option>For Rent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="location">
                                    <option>Location</option>
                                    <option>United States</option>
                                    <option>United Kingdom</option>
                                    <option>American Samoa</option>
                                    <option>Belgium</option>
                                    <option>Cameroon</option>
                                    <option>Canada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="property types">
                                    <option>Property Types</option>
                                    <option>Residential</option>
                                    <option>Commercial</option>
                                    <option>Land</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="bedrooms">
                                    <option>Bedrooms</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="bathrooms">
                                    <option>Bathrooms</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <div class="range-slider mb-0">
                                    <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <button class="search-button btn-3">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search area start -->

<!-- Featured properties start -->
@if(count($featuredProperties)> 0)
<div class="content-area featured-properties">
    <div class="container">
        <!-- Main title -->
        <div class="main-title-2">
            <h1>Featured <span>Properties</span></h1>
            <div class="title-border">
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
            </div>
        </div>
        <div class="row wow fadeInUp delay-04s">
        @foreach ($featuredProperties as $featureProperty)
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="property-3">
                    <img src="{{ asset('assets/img/properties/properties-13.jpg') }}" alt="photo" class="img-fluid w-100">
                    <div class="featured-tag2">Featured</div>
                    <div class="sale-tag">For {{ $featureProperty->type ==  'Buy' ? 'Sale' : 'Rent' }}</div>
                    <div class="ling-section">
                        <h3>
                            <a href="properties-details.html">{{ $featureProperty->name }}</a>
                        </h3>
                        <ul class="facilities-list">
                            <li>{{$featureProperty->bedroom}} Beds</li>
                            <li>{{$featureProperty->bathroom}} Baths</li>
                            <li>{{$featureProperty->area_sqf  }} SQ FT</li>
                            <li>{{$featureProperty->parking_lots}} Garage</li>
                        </ul>
                        <a href="properties-details.html" class="read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endif
<!-- Featured properties end -->

<!-- Our service start -->
<div class="our-service-there">
    <div class="our-service-there-inner">
        <div class="container">
            <!-- Main title -->
            <div class="main-title main-title-5">
                <h1>What Are you Looking For?</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft delay-04s">
                    <div class="bg-service-color">
                        <div class="services-info-4">
                            <div class="icon">
                                <i class="flaticon-people-1"></i>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="services-1.html">Trusted By Thousands</a>
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                            </div>
                        </div>
                        <div class="services-info-4">
                            <div class="icon">
                                <i class="flaticon-symbol-1"></i>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="services-1.html">Financing Made Easy</a>
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                        <div class="services-info-4 mb-0">
                            <div class="icon">
                                <i class="flaticon-apartment"></i>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="services-1.html">
                                        Wide Renge Of Properties
                                    </a>
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInRight delay-04s">
                    <div class="cap2">
                        <img src="{{ asset('assets/img/avatar/avatar-8.png') }}" alt="avatar-6" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our service end -->

<!-- Recently properties start -->
<div class="content-area comon-slick recently-properties clearfix">
    <div class="container">
        <!-- Main title -->
        <div class="main-title-2">
            <h1 class="text-center">Recently  <span>Properties</span></h1>
            <div class="title-border">
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
            </div>
        </div>

        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            @forelse ($properties as $property)
            <div class="item slide-box wow fadeInRight delay-04s">
                <div class="property-2">
                    <div class="property-inner">
                        <div class="property-overflow">
                            <div class="property-photo">
                                <img src="{{ asset('admin-asset/images/product_images/'.$property->image) }}" alt="rp" class="img-fluid">
                                
                                <div class="price-ratings">
                                    <div class="price">{{ $property->price_sqf .'AED' }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- content -->
                        <div class="content">
                            <!-- title -->
                            <h4 class="title">
                                <a href="properties-details.html">{{ $property->name }}</a>
                            </h4>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>{{ $property->address }}
                                </a>
                            </h3>
                        </div>
                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                <span>{{ $property->area_sqf }} sq ft</span>
                            </li>
                            <li>
                                <i class="flaticon-bed"></i>
                                <span>{{ $property->bedroom }}Bed</span>
                            </li>
                            <li>
                                <i class="flaticon-holidays"></i>
                                <span>{{$property->bathroom}}Bath</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
<!-- Recently Partners block end -->

<!-- Counters 2 strat -->
<div class="counters-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 align-self-center wow fadeInLeft delay-04s">
                <div class="sec-title-three">
                    <div class="main-title main-title-5 mb-0">
                        <h1>More than 10 Years of Experience</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 wow fadeInRight delay-04s">
                <div class="counters-3-inner">
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-tag"></i>
                        <div class="detail">
                            <h1 class="counter">{{ $saleProperty }}</h1>
                            <p>Listings For Sale</p>
                        </div>
                    </div>
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-symbol-1"></i>
                        <div class="detail">
                            <h1 class="counter">{{$rentProperty}}</h1>
                            <p>Listings For Rent</p>
                        </div>
                    </div>
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-people"></i>
                        <div class="detail">
                            <h1 class="counter">{{ $totalAgents }}</h1>
                            <p>Agents</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters 2 end -->

<!-- Popular Places strat -->

<!-- Popular places end -->
<div class="agent-section content-area-17 comon-slick mt-5">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Agent</h1>
            <p></p>
        </div>
        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
           @foreach ($agents as $agent)
           <div class="item slide-box wow fadeInRight delay-04s">
               <div class="agent-1">
                   <div class="member-thumb">
                       <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="agent-1" class="img-fluid w-100">
                   </div>
                   <div class="member-content-wrap">
                       <div class="member-name-designation">
                           <h4 class="member-name">
                               <a href="agent-single.html">{{ $agent->username }}</a>
                           </h4>
                           <div class="social-list clearfix">
                               <a href="#"><i class="fa fa-phone"></i></a>
                           </div>
                       </div>
                   </div>
                   <div class="team-hover-content">
                       <div class="member-thumb">
                           <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="agent-1" class="img-fluid w-100 h-100">
                       </div>
                       <div class="member-name-designation">
                           <h4 class="member-name">
                               <a href="agent-single.html">{{ $agent->username }}</a>
                           </h4>
                       </div>
                       <div class="member-socials">
                           <a href="#" class="google-bg"><i class="fa fa-phone"></i></a>
                       </div>
                   </div>
               </div>
           </div>
           @endforeach
        </div>
    </div>
</div>
<!-- Agent section start -->

<!-- Agent section end -->
<div class="testimonials-3 content-area-7 comon-slick">
    <div class="container">
        <!-- Main title -->
        <div class="main-title main-title-5">
            <h1>Our Testimonial</h1>
        </div>
        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            @foreach ($testimonials as $testimonial)
            <div class="item slide-box wow fadeInRight delay-04s">
                <div class="testimonials-inner">
                    <div class="user">
                        <a href="#">
                            <img class="media-object" src="{{ isset($testimonial->image) ?  asset('admin-asset/images/testimonial_images/' . $testimonial->image)  : '' }}"  alt="user">
                        </a>
                    </div>
                    <div class="testimonial-info">
                        <h3>
                           {{ $testimonial->name }}
                        </h3>
                        <p>{{ $testimonial->description }}</p>
                       
                    </div>
                </div>
            </div>
            @endforeach
           
           
        </div>
    </div>
</div>
<!-- Testimonials 2 -->

<!-- Testimonial 2 end -->
<div class="clearfix"></div>

<!-- Blog start -->
<div class="blog comon-slick content-area-8">
    <div class="container">
        <!-- Main title -->
        <div class="main-title-2">
            <h1 class="text-center">Our  <span>Blog</span></h1>
            <div class="title-border">
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
            </div>
        </div>
        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
           @foreach ($blogs as $blog)
           <div class="item slide-box wow fadeInUp delay-04s">
               <div class="blog-1">
                   <div class="blog-inner">
                       <div class="blog-overflow">
                           <div class="blog-photo">
                               <img src="{{ asset('assets/img/blog/blog-1.jpg') }}" alt="blog-1" class="img-fluid">
                           </div>
                       </div>
                       <div class="detail">
                           <h3>
                               <a href="{{ route('blogShow',['slug'=>$blog->slug]) }}">{{ $blog->name }}</a>
                           </h3>
                           <ul class="post-meta clearfix">
                               <li>
                                   <i class="fa fa-user-o"></i> admin
                               </li>
                               <li>
                                   <i class="fa fa-calendar-check-o"></i> 
                                   {{ $blog->created_at->format('M d, Y') }}
                               </li>
                             
                           </ul>
                           <p>{{ \Str::limit($blog->description, 100) }}</p>
                       </div>
                   </div>
               </div>
           </div>
           @endforeach
           
            
          
        </div>
    </div>
</div>
<!-- Blog end -->

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
<!-- Intro section end -->
@endsection