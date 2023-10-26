@extends('client.layouts.master')
@section('title','Blog')
@section('content')

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Blog</h1>
            <ul class="breadcrumbs">
                <li><a href="/">Home</a></li>
                <li class="active">Blog</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Blog body start -->
<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="row">
                    @forelse ($blogs as $blog)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="blog-2">
                            <img src=" {{ asset("admin-asset/images/blog_images/".$blog->image) }} " alt="blog-photo" class="img-fluid w-100">
                            <div class="date-box">
                                <span>{{ $blog->created_at->format('d') }}</span> {{ $blog->created_at->format('F') }}
                            </div>
                            <div class="blog-info">
                                <h3><a href="{{route('blogShow',['slug'=>$blog->slug])}}">{{ $blog->name ?? '' }}</a></h3>
                                <p>{{ \Str::limit($blog->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                        
                    @empty
                        <p>Sorry No Record found</p>
                    @endforelse
                </div>
                <!-- Blog box end -->

              <!-- Pagination box start -->
            <div class="pagination-box text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @if ($blogs->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Prev</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $blogs->previousPageUrl() }}">Prev</a></li>
                        @endif

                        @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                            <li class="page-item{{ $page == $blogs->currentPage() ? ' active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($blogs->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $blogs->nextPageUrl() }}">Next</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </nav>
            </div>

                <!-- Pagination box end -->
            </div>
            <div class="col-lg-4 col-md-12 col-xs-12">
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
                    <div class="sidebar-widget popular-posts">
                        <div class="main-title-4">
                            <h1>Recent Properties</h1>
                        </div>
                        <div class="d-flex mb-3 popular-posts-box">
                            <a class="pr-3" href="properties-details.html">
                                <img src="{{ asset('assets/img/properties/small-properties-2.jpg') }}" alt="small-photo" class="flex-shrink-0 me-3">
                            </a>
                            <div class="detail align-self-center">
                                <h4>
                                    <a href="properties-details.html">Modern Family Home</a>
                                </h4>
                                <div class="listing-post-meta">
                                    Sep 18, 2021 | <a href="#">$470,00</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3 popular-posts-box">
                            <a class="pr-3" href="properties-details.html">
                                <img src="{{ asset('assets/img/properties/small-properties-1.jpg') }}" alt="small-photo" class="flex-shrink-0 me-3">
                            </a>
                            <div class="detail align-self-center">
                                <h4>
                                    <a href="properties-details.html">Sweet Family Home</a>
                                </h4>
                                <div class="listing-post-meta">
                                    Aug 18, 2020 | <a href="#">$485,00</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex popular-posts-box">
                            <a class="pr-3" href="properties-details.html">
                                <img src="{{ asset('assets/img/properties/small-properties-3.jpg') }}" alt="small-photo" class="flex-shrink-0 me-3">
                            </a>
                            <div class="detail align-self-center">
                                <h4>
                                    <a href="properties-details.html">Beautful Single Home</a>
                                </h4>
                                <div class="listing-post-meta">
                                    Aug Feb, 2021 | <a href="#">$850,00</a>
                                </div>
                            </div>
                        </div>
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