@extends('blog.layout.master')
@section('title', __('صفحه اصلی'))

@section('styles')
@endsection

@section('content')

<!-- Trending Now -->
<div class="container">
    <div class="trending-now">
        <span class="trending-now__label">
            <i class="ui-flash"></i>
            محبوب ترین ها</span>
        <div class="newsticker">
            <ul class="newsticker__list">
                    @foreach ($posts->sortByDesc('like') as $post)
                        <li class="newsticker__item"><a href="{{ route('user.blog.posts.show', $post->slug) }}" class="newsticker__item-url">{{$post->title}}</a></li>
                   @endforeach
            </ul>
        </div>
        <div class="newsticker-buttons">
            <button class="newsticker-button newsticker-button--next" id="newsticker-button--next" aria-label="previous article"><i class="ui-arrow-left"></i></button>
            <button class="newsticker-button newsticker-button--prev" id="newsticker-button--prev" aria-label="next article"><i class="ui-arrow-right"></i></button>
        </div>
    </div>
</div>

<div class="main-container container pt-24" id="main-container">


    <!-- Ad Banner 728 -->
    <div class="text-center pb-48">
        <a href="#">
            <img src="{{asset('user/blog/img/content/cinema-banner.jpg')}}" alt="">
        </a>
    </div>

    <!-- Carousel posts -->
    <section class="section mb-0">
        <div class="title-wrap title-wrap--line">
            <h3 class="section-title">پربازدیدترین مقالات</h3>
        </div>

        <!-- Slider -->
        <div id="owl-posts" class="owl-carousel owl-theme owl-carousel--arrows-outside">
            @php
                $count = 0;
            @endphp
            @foreach ($posts->sortByDesc('view') as $post)
                @php
                    $photoPath = $post->PostPhoto($post->id)->path;
                @endphp

                <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url({{$photoPath}});">
                        <div class="bottom-gradient"></div>
                        <div class="thumb-text-holder">
                            <h2 class="thumb-entry-title">
                                <a href="{{ route('user.blog.posts.show', $post->slug) }}">{{$post->title}}</a>
                            </h2>
                        </div>
                        <a href="{{ route('user.blog.posts.show', $post->slug) }}" class="thumb-url"></a>
                    </div>
                </article>

                @php
                    $count ++;
                @endphp
                @if ( $count == 4 )
                    @break
                @endif
            @endforeach

        </div> <!-- end slider -->

    </section> <!-- end carousel posts -->




    <!-- Content Secondary -->
    <div class="row">

        <!-- Posts -->
        <div class="col-lg-8 blog__content mb-72">

            <!-- Worldwide News -->
            <section class="section">
                <div class="title-wrap title-wrap--line">
                    <h3 class="section-title">اخبار تکنولند</h3>
                </div>

                @foreach ($posts as $post)
                <article class="entry card post-list">
                        @php
                            $photoPath = $post->PostPhoto($post->id)->path;
                        @endphp
                        <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(img/content/thumb/post-8.jpg)">
                            <a href="single-post.html" class="thumb-url"></a>
                            <img src="{{ url($photoPath) }}" alt="" class="entry__img">
                            <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--blue">{{$post->postCategory->title}}</a>
                        </div>
                        <div class="entry__body post-list__body card__body">
                            <div class="entry__header">
                                <h2 class="entry__title">
                                    <a href="{{route('user.blog.posts.show',$post->slug)}}">{{ $post->title }}</a>
                                </h2>
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>نویسنده:</span>
                                        <a href="">{{$post->user->username}}</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        {{number2farsi(verta($post->created_at)->format('%d %B %Y'))}}
                                    </li>
                                </ul>
                            </div>
                            <div class="entry__excerpt">
                                <p>{!! Str::limit($post->description,75,'...') !!}</p>
                            </div>
                        </div>
                </article>
            @endforeach

            </section> <!-- end worldwide news -->

            <!-- Pagination -->
            <nav class="pagination">
                <span class="pagination__page pagination__page--current">۱</span>
                <a href="#" class="pagination__page">۲</a>
                <a href="#" class="pagination__page">۳</a>
                <a href="#" class="pagination__page">۴</a>
                <a href="#" class="pagination__page pagination__icon pagination__page--next"><i class="ui-arrow-left"></i></a>
            </nav>

        </div> <!-- end posts -->

        <!-- Sidebar 1 -->
        <aside class="col-lg-4 sidebar sidebar--1 sidebar--right">

            <!-- Widget Categories -->
            <aside class="widget widget_categories">
                <h4 class="widget-title">دسته بندی نوشته ها</h4>
                <ul>
                    @foreach ($categories as $category)
                        @php
                            $p = App\Post::where('category_id',$category->id)->get();
                        @endphp
                        <li><a href="categories.html">{{$category->title}} <span class="categories-count">{{number2farsi(count($p))}}</span></a></li>
                    @endforeach
                </ul>
            </aside> <!-- end widget categories -->


            <!-- Widget Popular Posts -->
            <aside class="widget widget-popular-posts">
                <h4 class="widget-title">محبوب ترین مقالات</h4>
                <ul class="post-list-small">
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($posts->sortByDesc('like') as $post)
                        @php
                            $photoPath = $post->PostPhoto($post->id)->path;
                        @endphp
                        <li class="post-list-small__item">
                            <article class="post-list-small__entry clearfix">
                                <div class="post-list-small__img-holder">
                                    <div class="thumb-container thumb-100">
                                        <a href="{{ route('user.blog.posts.show', $post->slug) }}">
                                            <img data-src="{{ url($photoPath) }}" src="img/empty.png" alt="{{ $post->title }}" class="post-list-small__img--rounded lazyload">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-list-small__body">
                                    <h3 class="post-list-small__entry-title">
                                        <a href="{{ route('user.blog.posts.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    <ul class="entry__meta">
                                        <li class="entry__meta-author">
                                            <span>نویسنده:</span>
                                            <a href="#">{{ $post->user->username }}</a>
                                        </li>
                                        <li class="entry__meta-date">
                                            {{number2farsi(verta($post->created_at)->format('%d %B %Y'))}}
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </li>
                        @php
                            $count ++;
                        @endphp
                        @if ( $count == 4 )
                            @break
                        @endif
                    @endforeach
                </ul>
            </aside> <!-- end widget popular posts -->


        </aside> <!-- end sidebar 1 -->
    </div> <!-- content secondary -->


</div> <!-- end main container -->


@endsection
