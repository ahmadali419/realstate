@extends('client.layouts.master')
@section('title','Property')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Properties</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li class="active">Properties</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Properties section body start -->
<div class="properties-section property-big content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Option bar start -->
                <div class="option-bar">
                    <div class="row">
                        <div class="col-lg-6 col-md-5 col-sm-5">
                            <h4>
                                <span class="heading-icon">
                                    <i class="fa fa-th-list"></i>
                                </span>
                                <span class="title">Properties List</span>
                            </h4>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-7">
                            <div class="sorting-options advanced-search">
                                {{-- <select class="selectpicker search-fields sorting" name="new-to-old">
                                    <option>New To Old</option>
                                    <option>Old To New</option>
                                    <option>Properties (High To Low)</option>
                                    <option>Properties (Low To High)</option>
                                </select> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Option bar end -->
                <div class="clearfix"></div>
<div class="row">
    <ul class="list-inline-listing filters filters-listing-navigation mb-5">
        <li class="active btn filtr-button filtr" data-filter="all">All</li>
        <li data-filter="1" class="btn btn-inline filtr-button filtr">House</li>
        <li data-filter="2" class="btn btn-inline filtr-button filtr">Office</li>
        <li data-filter="3" class="btn btn-inline filtr-button filtr">Apartment</li>
        <li data-filter="4" class="btn btn-inline filtr-button filtr">Residential</li>
    </ul>

    <!-- property start -->
    @forelse ($properties as $property)
        
    <div class="property property-hp row g-0 fp2 clearfix wow fadeInUp delay-03s">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <!-- Property img -->
            <div class="property-img">
                <div class="property-price">{{ $property->price_sqf .'AED' ?? 0 }}</div>
                <img src="{{ asset('admin-asset/images/product_images/'.$property->image) }}" alt="fp-list" class="img-fluid w-100">
                <div class="property-overlay">
                    {{-- <a href="properties-details.html" class="overlay-link">
                        <i class="fa fa-link"></i>
                    </a>
                    <a class="overlay-link property-video" title="Lexus GS F">
                        <i class="fa fa-video-camera"></i>
                    </a> --}}
                    <div class="property-magnify-gallery">
                        <a href="{{ asset('admin-asset/images/product_images/'.$property->image) }}" class="overlay-link">
                            <i class="fa fa-expand"></i>
                        </a>
                        <a href="{{ asset('admin-asset/images/product_images/'.$property->image) }}" class="hidden"></a>
                        <a href="{{ asset('admin-asset/images/product_images/'.$property->image) }}" class="hidden"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 property-content">
            <div class="info">
                <!-- title -->
                <h1 class="title">
                    <a href="properties-details.html">{{ $property->title }}</a>
                </h1>
                <!-- Property address -->
                <h3 class="property-address">
                    <a href="properties-details.html">
                        <i class="fa fa-map-marker"></i>{{ $property->address }}</a>
                    </a>
                    <p style="float: right"><b>{{  isset($property->category) ? $property->category->name : '' }}</b></p>
                </h3>
                <!-- Facilities List -->
                <ul class="facilities-list clearfix">
                    <li>
                        <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                        <span>{{ $property->area_sqf .'ft' }}</span>
                    </li>
                    <li>
                        <i class="flaticon-bed"></i>
                        <span>{{ $property->bedroom }} Beds</span>
                    </li>
                  
                    <li>
                        <i class="flaticon-holidays"></i>
                        <span> {{ $property->bathroom }} Baths</span>
                    </li>
                    <li>
                        <i class="flaticon-vehicle"></i>
                        <span>{{ $property->parking_lots }} Garage</span>
                    </li>
                   
                </ul>
            </div>
            <div class="property-footer">
                <span class="left">
                    <a href="#"><i class="fa fa-user">{{ isset($property->user) ?  $property->user->username : 'Admin' }}</i></a>
                </span>
                <span class="right">
                    {{ $property->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
    </div>
    @empty
        <p>Sorry No Record Found</p>
    @endforelse
</div>
               
                <!-- property end -->
                @if(count($properties) >0)
                <div class="pagination-box text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @if ($properties->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">Prev</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $properties->previousPageUrl() }}">Prev</a></li>
                            @endif
    
                            @foreach ($properties->getUrlRange(1, $properties->lastPage()) as $page => $url)
                                <li class="page-item{{ $page == $properties->currentPage() ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
    
                            @if ($properties->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $properties->nextPageUrl() }}">Next</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">Next</span></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                @endif
                <!-- Pagination box start -->
              
                <!-- Pagination box end -->
            </div>
        </div>
    </div>
</div>

@endsection