@extends('technoland.layout.master')
@section('title', __('علاقمندی کاربر'))

@section('styles')
    <style>
        .pagination .page-item.active>.page-link, .pagination .page-item.active>.page-link:focus, .pagination .page-item.active>.page-link:hover {
            background-color: #00bfd6;
        }

        .pagination{
            justify-content: center!important;
        }
    </style>
@endsection
@section('content')


    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">لیست علاقمندی ها</h1>
                            </div>
                            <div class="content-section default">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        <div>{{session('success')}}</div>
                                    </div>
                                @endif
                                <div class="row">

                               @foreach($favorites as $favorite)
                                   @php
                                       $product = App\Product::findOrFail($favorite->product_id);
                                  @endphp

                               <div class="col-md-6 col-sm-12">
                                   <div class="profile-recent-fav-row">
                                       @if(!empty($product->get_img->url))
                                       <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}" class="profile-recent-fav-col profile-recent-fav-col-thumb">
                                           <img src="{{ url($product->get_img->url) }}"
                                                alt="{{$product->title}}">
                                       </a>
                                       @else
                                           <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}" class="profile-recent-fav-col profile-recent-fav-col-thumb">
                                               <img src="{{ asset('/user/img/not-img.png') }}">
                                           </a>
                                       @endif
                                       <div class="profile-recent-fav-col profile-recent-fav-col-title">
                                           <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">
                                               <h4 class="profile-recent-fav-name">
                                                   @if(strlen($product->title)>50)
                                                       {{ mb_substr($product->title,0,33).' ... ' }}
                                                   @else
                                                       {{ $product->title }}
                                                   @endif
                                               </h4>
                                           </a>

                                           <div class="profile-recent-fav-price">
                                               @if(!empty($product->discounts) && !empty($product->price))
                                                   {{ number_format($product->price-$product->discounts) }}
                                               @elseif(!empty($product->price))
                                                   {{ number_format($product->price) }}
                                               @endif
                                                   <span>تومان</span>
                                           </div>
                                       </div>
                                       <div class="profile-recent-fav-col profile-recent-fav-col-actions">
                                           <button onclick="del_row('<?= $favorite->id ?>','<?= url('user/remove_favorites') ?>','<?= Session::token() ?>')" class="btn-action btn-action-remove">
                                               <i class="fa fa-trash"></i>
                                           </button>
                                       </div>
                                       <div class="col-12 text-left mb-3">
                                           <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}" class="view-product">مشاهده محصول</a>
                                       </div>
                                   </div>
                               </div>
                               @endforeach

                                   @if(sizeof($favorites)==0)
                                       <div style="color:red;padding: 30px;">
                                            لیست علاقه مندی ها خالی میباشد.
                                       </div>
                                    @endif
                           </div>
                       </div>
                   </div>
               </div>
           </div>


           <div class="profile-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-1">
               <div class="profile-box">
                   <div class="profile-box-header">
                       <div class="profile-box-avatar">
                           <img src="{{asset('user/img/svg/user.svg')}}" alt="">
                       </div>
                       <button class="profile-box-btn-edit">
                           <i class="fa fa-pencil"></i>
                       </button>

                   </div>
                   <div class="profile-box-username">{{auth()->user()->username}}</div>
                   <div class="profile-box-tabs">
                       <a class="profile-box-tab profile-box-tab-access">
                           <i class="now-ui-icons ui-1_check"></i>
                           خوش آمدید
                       </a>
                       <a href="{{route('logout')}}" class="profile-box-tab profile-box-tab--sign-out">
                           <i class="now-ui-icons media-1_button-power"></i>
                           خروج از حساب
                       </a>
                   </div>
               </div>
               <div class="responsive-profile-menu show-md">
                   <div class="btn-group">
                       <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-navicon"></i>
                           حساب کاربری شما
                       </button>
                       <div class="dropdown-menu dropdown-menu-right text-right">
                           <a href="{{route('user.profile')}}" class="dropdown-item active-menu">
                               <i class="now-ui-icons users_single-02"></i>
                               پروفایل
                           </a>
                           <a href="{{route('user.orders')}}" class="dropdown-item">
                               <i class="now-ui-icons shopping_basket"></i>
                               همه سفارش ها
                           </a>
                           <a href="{{route('user.favorites')}}" class="dropdown-item">
                               <i class="now-ui-icons files_single-copy-04"></i>
                               لیست علاقمندی ها
                           </a>
                           <a href="{{route('user.question')}}" class="dropdown-item">
                               <i class="now-ui-icons business_badge"></i>
                               نظرات من
                           </a>
                           <a href="{{route('user.comment')}}" class="dropdown-item">
                               <i class="now-ui-icons business_badge"></i>
                               پرسش های من
                           </a>
                           <a href="{{route('user.address')}}" class="dropdown-item">
                               <i class="now-ui-icons business_badge"></i>
                               آدرس ها
                           </a>
{{--                           <a href="profile-personal-info.html" class="dropdown-item">--}}
{{--                               <i class="now-ui-icons business_badge"></i>--}}
{{--                               تکنو بن--}}
{{--                           </a>--}}

{{--                           <a href="profile-personal-info.html" class="dropdown-item">--}}
{{--                               <i class="now-ui-icons business_badge"></i>--}}
{{--                               پیغام های من--}}
{{--                           </a>--}}
                       </div>
                   </div>
               </div>
               <div class="profile-menu hidden-md">
                   <div class="profile-menu-header">حساب کاربری شما</div>
                   <ul class="profile-menu-items">
                       <li>
                           <a href="{{route('user.profile')}}" class="active">
                               <i class="now-ui-icons users_single-02"></i>
                               پروفایل
                           </a>
                       </li>
                       <li>
                           <a href="{{route('user.orders')}}">
                               <i class="now-ui-icons shopping_basket"></i>
                               همه سفارش ها
                           </a>
                       </li>
                       <li>
                           <a href="{{route('user.favorites')}}">
                               <i class="now-ui-icons files_single-copy-04"></i>
                               لیست علاقمندی ها
                           </a>
                       </li>

                       <li>
                           <a href="{{route('user.question')}}">
                               <i class="now-ui-icons business_badge"></i>
                               نظرات من
                           </a>
                       </li>
                       <li>
                           <a href="{{route('user.comment')}}">
                               <i class="now-ui-icons business_badge"></i>
                               پرسش های من
                           </a>
                       </li>
                       <li>
                           <a href="{{route('user.address')}}">
                               <i class="now-ui-icons business_badge"></i>
                               آدرس ها
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
       </div>
   </div>
</main>

@endsection