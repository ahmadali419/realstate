@extends('client.layouts.master')
@section('title','Agents')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Agent List</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li class="active">Agent List</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Agent section start -->
<div class="agent-section content-area">
    <div class="container">
        <!-- option bar start -->
        <div class="option-bar">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-5">
                    <h4>
                        <span class="heading-icon">
                            <i class="fa fa-th-list"></i>
                        </span>
                        <span class="title">Agent List</span>
                    </h4>
                </div>
                
            </div>
        </div>
        <!-- option bar end -->
        <div class="clearfix"></div>

        <div class="row">
            @forelse ($agents as $agent)
                
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Agent box 2 start -->
                <div class="row agent-2 a-two g-0">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="photo">
                            <img src="{{ asset('assets/img/team/team-1.jpg') }}" alt="agent-2" class="img-fluid">
                           
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 align-self-center">
                        <div class="detail">
                            <h4>
                                <a href="agent-single.html">{{ $agent->username }}</a>
                            </h4>
                            <div class="contact">
                                <ul>
                                    <li>
                                        <strong>Address:</strong><a href="#"> {{$agent->address}}</a>
                                    </li>
                                    <li>
                                        <strong>Email:</strong><a href="mailto:info@themevessel.com"> {{ $agent->email }}</a>
                                    </li>
                                    <li>
                                        <strong>Mobile:</strong><a href="tel:+554XX-634-7071">{{ $agent->mobile }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Agent box 2 end -->
            </div>
            @empty
                <p>No Agent found</p>
            @endforelse

        </div>
    </div>
</div>
@endsection