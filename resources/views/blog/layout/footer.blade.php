<footer class="footer footer--light">
    <div class="container">
        <div class="footer__widgets">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <aside class="widget widget-logo">
                        <a href="index.html">
                            <img src="img/logo_default_white.png" srcset="img/logo_default_white.png 1x, img/logo_default_white@2x.png 2x" class="logo__img" alt="">
                        </a>
                        <p class="copyright">استفاده از مطالب برای مقاصد غیرتجاری با ذکر نام {{setting('name')}} و لینک به منبع بلامانع است. حقوق این سایت به فروشگاه آنلاین {{setting('name')}} تعلق دارد.</p>
                        <div class="socials socials--large socials--rounded mb-24">
                            <a href="{{setting('instagram')}}" class="social social-instagram" aria-label="instagram"><i class="ui-instagram"></i></a>
                            <a href="{{setting('whatsapp')}}" class="social social-whatsapp" style="background:#78da78" aria-label="whatsapp"><i class="ui-whatsapp"></i></a>
                        </div>
                    </aside>
                </div>

                <div class="col-lg-4 col-md-6">
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
                            @if ( $count == 3 )
                                @break
                            @endif
                        @endforeach

                        </ul>
                    </aside>
                </div>

                <div class="col-lg-4 col-md-6">
                    <aside class="widget widget_mc4wp_form_widget">
                        <h4 class="widget-title">خبرنامه</h4>
                        <p class="newsletter__text">
                            <i class="ui-email newsletter__icon"></i>
                            برای اطلاع از آخرین خبرها مشترک شوید
                        </p>
                        <form class="mc4wp-form" method="post">
                            <div class="mc4wp-form-fields">
                                <div class="form-group">
                                    <input type="email" name="EMAIL" placeholder="ایمیل" required="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-lg btn-color" value="عضویت">
                                </div>
                            </div>
                        </form>
                    </aside>
                </div>

            </div>
        </div>
    </div> <!-- end container -->
</footer> <!-- end footer -->
