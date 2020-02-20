@extends('blog.layout.master')
@section('title', __())

@section('styles')
    <link rel="stylesheet" href="/admin/fonts-awesome/css/font-awesome.min.css">
    <style media="screen">
        input, select, textarea{
            margin-bottom: 10px;
        }
        .entry__meta1 li {
    display: inline-block;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    color: #83858F;
    padding-left: 10px;
}



    </style>
@endsection

@section('content')
    <!-- Breadcrumbs -->
    <div class="container">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a href="{{ route('user.blog.posts.index')}}" class="breadcrumbs__url">خانه</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__url">اخبار</a>
            </li>
            <li class="breadcrumbs__item breadcrumbs__item--current">
                {{ $post->postCategory->title }}
            </li>
        </ul>
    </div>

    <div class="main-container container" id="main-container">

        <!-- Content -->
        <div class="row">

            <!-- post content -->
            <div class="col-lg-8 blog__content mb-72">
                <div class="content-box">
                    <!-- standard post -->
                    <article class="entry mb-0">

                        <div class="single-post__entry-header entry__header">
                            <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--green">{{ $post->PostCategory->title }}</a>
                            <h1 class="single-post__entry-title">
                                {{ $post->title }}
                            </h1>

                            <div class="entry__meta-holder">
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>نویسنده:</span>
                                        <a href="#">{{ $post->user->name }}</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        {{number2farsi(verta($post->created_at)->format('%d %B %Y'))}}
                                    </li>
                                </ul>

                                <ul class="entry__meta1">
                                    @if(Auth::check())
                                  @if($postLike)
                                      <li class="entry__meta-views">
                                          <i id="like_info" onclick="dislike('<?= $post->id?>')" class="fa fa-thumbs-down"></i>
                                      </li>
                                          <span>{{ number2farsi($countLike) ?? 0}}</span>
                                    @else
                                        <li class="entry__meta-views">
                                            <i id="like_info" onclick="like('<?= $post->id?>')" class="fa fa-thumbs-up"></i>
                                            <span>{{ number2farsi($countLike) ?? 0 }}</span>
                                        </li>
                                    @endif
                                @endif


                                    <li class="entry__meta-views">
                                        <i class="ui-eye"></i>
                                        <span>{{ number2farsi($post->view) }}</span>
                                    </li>
                                    <li class="entry__meta-comments">
                                        <i class="ui-chat-empty" style="padding-left:5px;"></i>{{ number2farsi(count($post->postComments)) }}
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- end entry header -->

                        <div class="entry__img-holder">
                            <img src="img/content/thumb/post-8.jpg" alt="" class="entry__img">
                        </div>

                        <div class="entry__article-wrap">

                            <!-- Share -->
                            <div class="entry__share">
                                <div class="sticky-col">
                                    <div class="socials socials--rounded socials--large">
                                        <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
                                            <i class="ui-facebook"></i>
                                        </a>
                                        <a class="social social-twitter" href="#" title="twitter" target="_blank" aria-label="twitter">
                                            <i class="ui-twitter"></i>
                                        </a>
                                        <a class="social social-google-plus" href="#" title="google" target="_blank" aria-label="google">
                                            <i class="ui-google"></i>
                                        </a>
                                        <a class="social social-pinterest" href="#" title="pinterest" target="_blank" aria-label="pinterest">
                                            <i class="ui-pinterest"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> <!-- share -->

                            <div class="entry__article">
                                <p>{{ $post->description }}</p>
                                <!-- tags -->
                                <div class="entry__tags">
                                    <i class="ui-tags"></i>
                                    {{-- <span class="entry__tags-label">برچسب ها:</span> --}}
                                    {{-- <a href="#" rel="tag">نمایشگاه MWC 2019</a> --}}
                                    {{-- <a href="#" rel="tag">هوآوی</a> --}}
                                </div> <!-- end tags -->

                            </div> <!-- end entry article -->
                        </div> <!-- end entry article wrap -->



                        <div class="entry-comments">
                                                    <div class="title-wrap title-wrap--line">
                                                        <h3 class="section-title">{{ number2farsi($post->postComments->count()) }} دیدگاه</h3>
                                                    </div>
                                                    @if(Session::has('success'))
                                                        <div class="alert alert-success">
                                                            <div>{{session('success')}}</div>
                                                        </div>
                                                    @endif
                                                    <ul class="comment-list">
                                                        <li class="comment">

                                                            @foreach ($post->postComments as $comment)

                                                                <div class="comment-body">
                                                                    <div class="comment-text">
                                                                        <h6 class="comment-author">{{$comment->name}}</h6>
                                                                        <div class="comment-metadata">
                                                                            <a href="#" class="comment-date">{{number2farsi(verta($post->created_at)->format('%d %B %Y'))}}</a>
                                                                        </div>
                                                                        <p>{{ $comment->description}}</p>

                                                                    </div>
                                                                    <div class="mb-4 ml-4">
                                                                        <div class="media-body">
                                                                            <div class=" mt-2 mb-2 row">
                                                                                <div class="col-md-12 mb-2">
                                                                                    <button class="btn btn-warning btn-open" style="background:#2d95e3;" id="div-comment-{{$comment->id}}"> پاسخ</button>
                                                                                </div>
                                                                                <div class="form-reply col-md-12" id="f-div-comment-{{$comment->id}}" style="display: none">
                                                                                    <form id="form" class="comment-form" method="POST" action="{{ route('user.blog.comments.reply') }}">

                                                                                        @csrf

                                                                                        <input name="post_id" type="hidden" value="{{$post->id}}">
                                                                                        <input name="parent_id" type="hidden" value="{{$comment->id}}">
                                                                                        <p class="comment-form-comment">
                                                                                            <label for="comment">دیدگاه<span style="color:red">*</span></label>
                                                                                            <textarea id="description" name="description" rows="5"></textarea>
                                                                                            @if($errors->has('description'))
                                                                                                <span style="color:red;font-size:13px">{{ $errors->first('description') }}</span>
                                                                                            @endif
                                                                                        </p>

                                                                                        <div class="row row-20">
                                                                                            <div class="col-lg-4">
                                                                                                <label for="name">نام: <span style="color:red">*</span></label>
                                                                                                <input name="name" type="text">
                                                                                                @if($errors->has('name'))
                                                                                                    <span style="color:red;font-size:13px">{{ $errors->first('name') }}</span>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="col-lg-4">
                                                                                                <label for="comment">ایمیل: <span style="color:red">*</span></label>
                                                                                                <input name="email" id="email" type="email">
                                                                                                @if($errors->has('email'))
                                                                                                    <span style="color:red;font-size:13px">{{ $errors->first('email') }}</span>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>

                                                                                        <p class="comment-form-submit">
                                                                                            <input type="submit" class="btn btn-lg btn-color btn-button" value="ارسال دیدگاه" id="submit-message">
                                                                                        </p>

                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @include('blog.comments',['comment->replies'=>$comment->replies])

                                                            @endforeach

                                                        </li> <!-- end 1-2 comment -->
                                                    </ul>
                                                </div>

                                                <div id="respond" class="comment-respond">
                                                <div class="title-wrap">
                                                    <h5 class="comment-respond__title section-title">دیدگاه شما</h5>
                                                </div>
                                                <form id="form" class="comment-form" method="POST" action="{{ route('user.blog.comments.store') }}">

                                                        @csrf

                                                        <input name="postId" type="hidden" value="{{$post->id}}">
                                                        <p class="comment-form-comment">
                                                            <label for="comment">دیدگاه<span style="color:red">*</span></label>
                                                            <textarea id="description" name="description" rows="5"></textarea>
                                                            @if($errors->has('description'))
                                                                <span style="color:red;font-size:13px">{{ $errors->first('description') }}</span>
                                                            @endif
                                                        </p>

                                                        <div class="row row-20">
                                                            <div class="col-lg-4">
                                                                <label for="name">نام: <span style="color:red">*</span></label>
                                                                <input name="name" type="text">
                                                                @if($errors->has('name'))
                                                                    <span style="color:red;font-size:13px">{{ $errors->first('name') }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label for="comment">ایمیل: <span style="color:red">*</span></label>
                                                                <input name="email" id="email" type="email">
                                                                @if($errors->has('email'))
                                                                    <span style="color:red;font-size:13px">{{ $errors->first('email') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <p class="comment-form-submit">
                                                            <input type="submit" class="btn btn-lg btn-color btn-button" value="ارسال دیدگاه" id="submit-message">
                                                        </p>

                                                    </form>

                        </div>
                    <!-- Single Comment -->
                </article> <!-- end standard post -->
                </div> <!-- end content box -->

            </div> <!-- end post content -->

            <!-- Sidebar -->
            <aside class="col-lg-4 sidebar sidebar--right">

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
                                            <a href="single-post.html">
                                                <img data-src="{{ url($photoPath) }}" src="img/empty.png" alt="" class="post-list-small__img--rounded lazyload">
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

        


                <!-- Widget Ad 300 -->
                <aside class="widget widget_media_image">
                    <a href="#">
                        <img src="img/content/mag-1.jpg" alt="">
                    </a>
                </aside> <!-- end widget ad 300 -->



            </aside> <!-- end sidebar -->

        </div> <!-- end content -->
    </div> <!-- end main container -->

@endsection


@section('scripts')

    <script src="js/lazysizes.min.js"></script>
<?php
$url3 = url('blog/post/like');
$url4 = url('blog/post/dislike');
 ?>

    <script>
        like = function (post_id) {

            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                url: '{{ $url3 }}',
                type: 'POST',
                data: 'post_id=' + post_id,
                success: function (data) {
                    $("#like_info").css('color', 'blue');
                }
            });
        };

        dislike = function (post_id) {
            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                url: '{{ $url4 }}',
                type: 'POST',
                data: 'post_id=' + post_id,
                success: function (data) {
                    $("#like_info").css('color', 'red');
                }
            });
        };
    </script>

    <script type="text/javascript">
        $(".btn-open").click(function(){
          $('.form-reply').css('display', 'none')
          var service = this.id
          var service_id = '#f-' + service
          $(service_id).show('slow');
        })
    </script>

@endsection
