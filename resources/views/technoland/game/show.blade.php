@extends('technoland.game.master')
@section('title', __('مشاهده جزییات'))

@section('content')
    <!--start header section-->
    <header class="header">
        <!--start navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="logo_technoland">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar"
                        aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto navbar-right">
                        <li><a class="page-scroll" href="{{url('Techno/Game')}}">خانه</a></li>
                        <li class="active"><a class="page-scroll">مشاهده جزییات</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--end navbar-->
    </header>
    <!--end header section-->

    <!--start hero section-->
    <section id="hero" class="section-hero section-rotate">
        <div class="section-inner">
        </div>
        <!--background circle shape-->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="hero-product-img">
                        <div class="offer-badge">
                            <p><strong>مشاهده</strong>جزییات</p>
                        </div>
                        <div class="hero-img-1">
                            <img src="{{url($game->url)}}" alt="hero-img" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hero-content-wrap-1">
                        <div class="hero-content">
                            <h3 style="text-align: right;color: white;">{{$game->title}}</h3>
                            <p>
                                {{Str::limit($game->description,120)}}
                            </p>
                            <div class="slider-action-btn">
                                <a style="cursor: unset;" class="page-scroll btn softo-solid-btn">معرفی</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end hero section-->

    <section id="features" class="new-features ptb-90">
        <div class="new-features-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="feature-heading">
                            <h3>معرفی تکنوگیم</h3>
                        </div>
                        <!--feature single start-->
                        <div class="single-feature mtb-5">
                            <div class="feature-icon">
                                <div class="icon icon-shape">
                                    <i class="flaticon-volume"></i>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h5>{{$game->title}}</h5>
                                <p class="mb-0">{!! $game->description !!}</p>
                            </div>
                        </div>
                        <!--feature single end-->

                    </div>
                    <div class="col-md-6">
                        <div class="feature-image">
                            <img src="{{url($game->url)}}" alt="{{$game->title}}" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection