@extends('technoland.layout.master')
@section('title', __('توضیحات محصول'))

@section('styles')
    <meta http-equiv="Refresh" content="8; url={{url('/')}}">
@endsection

@section('content')

    @if($error_cancel == 'nok')
        <main class="cart default">
            <div class="container text-center">
                <div class="cart-empty">
                    <div class="cart-empty-icon">
                        <i class="now-ui-icons shopping_basket"></i>
                    </div>
                    <div class="cart-empty-title">خطا! فرایند خرید توسط کاربر لغو شد.</div>
                </div>
            </div>
        </main>
    @elseif($success_status == 'success_status')
       <main class="cart default">
            <div class="container text-center">
                <div class="cart-empty">
                    <div class="cart-empty-icon">
                        <i class="now-ui-icons shopping_basket"></i>
                    </div>
                    <div class="cart-empty-title">عملیات پرداخت موفق بوده و قبلا تأیید پرداخت تراکنش انجام شده است.</div>
                </div>
            </div>
        </main>
    @elseif($order == 'order')

        <main class="cart default">
            <div class="container text-center">
                <div class="cart-empty">
                    <div class="cart-empty-icon">
                        <i class="now-ui-icons shopping_basket"></i>
                    </div>
                    <div class="cart-empty-title">سفارش موجود نیست دوباره تلاش کنید.</div>
                </div>
            </div>
        </main>
    @endif


@endsection

