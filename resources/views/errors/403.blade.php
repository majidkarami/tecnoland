@extends('technoland.layout.master')
@section('title', __('خطا!'))


@section('content')
    <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-page">
                        <img src="{{url('images/404.jpg')}}" alt="" />
                        <h2><i>خطا! </i> صفحه مورد نظر پیدا نشد!</h2>
                        <h3>احتمالا مشکلی پیش آمده است! لطفا دوباره تلاش کنید.</h3>
                        <form method="post" action="{{route('search.product')}}">
                            {{csrf_field()}}
                        <input type="text" name="search-name" placeholder="جستجو" />
                        <input type="submit" class="submit" value="برو" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection