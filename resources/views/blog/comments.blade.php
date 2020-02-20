@foreach ($comment->replies as $comment)
    <div class="comment-body" style="padding-right:20px;">
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
                        <button class="btn btn-warning btn-open" style="background:gray;" id="div-comment-{{$comment->id}}"> پاسخ</button>
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
