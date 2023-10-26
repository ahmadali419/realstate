@extends('client.layouts.master')
@section('title',$blog->name)
@section('content')
    <!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{ $blog->name }}</h1>
            <ul class="breadcrumbs">
                <li><a href="/">Home</a></li>
                <li class="active">Blog {{ $blog->name }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Blog body start -->
<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <!-- Blog box start -->
                <div class="blog-box clearfix">
                    <img src="{{ asset("admin-asset/images/blog_images/".$blog->image) }}" alt="blog-1" class="img-fluid w-100">
                    <!-- detail -->
                    <div class="detail">
                        <!--Main title -->
                        <h3 class="title">
                            <a href="{{route('blogShow',['slug'=>$blog->slug])}}">{{ $blog->name }}</a>
                        </h3>
                        <!-- Post meta -->
                        <div class="post-meta">
                            <span><a href="#"><i class="fa fa-user"></i>Admin</a></span>
                            <span><a><i class="fa fa-calendar"></i>{{ $blog->created_at->format('M d, Y') }}</a></span>
                        </div>
                        <!-- paragraph -->
                        <p class="mb-30">
                            {{ $blog->description }}
                        </p>
                        
                       
                    </div>
                </div>
                <!-- Blog box end -->

                
                <!-- Comments section end -->

               
                <!-- Contact end -->
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="sidebar">
                    <!-- Search box start-->
                   
                    <!-- Search box end-->

                    <!-- Category posts start -->
                 
                    <!-- Category posts end-->

                    <!-- Popular posts start-->
                    <div class="sidebar-widget popular-posts">
                        <div class="main-title-4">
                            <h1>Recent Blogs</h1>
                        </div>
                        @foreach ($recentBlogs as $blog)
                        <div class="d-flex mb-3 popular-posts-box">
                            <a class="pr-3" href="{{route('blogShow',['slug'=>$blog->slug])}}">
                                <img src="{{ asset("admin-asset/images/blog_images/".$blog->image) }}" alt="blog-photo" class="flex-shrink-0 me-3">
                            </a>
                            <div class="detail align-self-center">
                                <h4>
                                    <a href="{{route('blogShow',['slug'=>$blog->slug])}}">{{ $blog->name }}</a>
                                </h4>
                                <div class="listing-post-meta">
                                    {{ $blog->created_at->format('M d, Y') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        
                    </div>
                    <!-- Popular posts end-->

                    <!-- Archives start -->
                  
                    <!-- Archives end -->

                    <!-- Tags box start-->
                   
                    <!-- Tags box end -->

                    <!-- Social media start -->
                    <div class="social-media-area sidebar-widget clearfix">
                        <!-- Main Title 2 -->
                        <div class="main-title-4">
                            <h1><span>Social</span> Media</h1>
                        </div>
                        <!-- Social list -->
                        <div class="social-media clearfix">
                            <div class="social-list">
                                <div class="icon facebook">
                                    <div class="tooltip">Facebook</div>
                                    <span><i class="fa fa-facebook"></i></span>
                                </div>
                                <div class="icon twitter">
                                    <div class="tooltip">Twitter</div>
                                    <span><i class="fa fa-twitter"></i></span>
                                </div>
                                <div class="icon instagram">
                                    <div class="tooltip">Instagram</div>
                                    <span><i class="fa fa-instagram"></i></span>
                                </div>
                                <div class="icon github">
                                    <div class="tooltip">Github</div>
                                    <span><i class="fa fa-github"></i></span>
                                </div>
                                <div class="icon youtube mr-0">
                                    <div class="tooltip">Youtube</div>
                                    <span><i class="fa fa-youtube"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Social media end -->

                    <!-- Latest tweet start -->
                    
                    <!-- Latest tweet end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection