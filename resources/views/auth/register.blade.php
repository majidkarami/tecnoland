@extends('layouts.app')

@section('content')

    <div class="row content_box">

        <div class="header_register">

            <div>
                <li></li>
                <h5>ثبت نام در دیجی آنلاین</h5>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">

               <div class="register_form">
                   <form method="post" action="{{ route('register') }}">
                       {{ csrf_field() }}

                       <div class="form-group">
                           <span>شماره همراه یا پست الکترونیک</span>
                           <input type="text" value="{{ old('username') }}" class="form-control" name="username" placeholder="Phone number or Email">
                           @if($errors->has('username'))
                           <span class="has-error">{{ $errors->first('username') }}</span>
                           @endif
                       </div>


                       <div class="form-group">
                           <span>کلـــمه عبــور</span>
                           <input type="password" class="form-control" name="password" placeholder="Password">
                           @if($errors->has('password'))
                               <span class="has-error">{{ $errors->first('password') }}</span>
                           @endif
                       </div>


                       <div class="form-group">
                           <div class="form-label-group">
                               <label for="captcha">کد امنیتی</label>
                               <input type="text" autocomplete="off" id="captcha" class="form-control" name="captcha" placeholder="کد امنیتی"
                                      required data-parsley-error-message="فیلد کد امنیتی را وارد نمایید">
                               @if($errors->has('captcha'))
                                   <span class="has-error" style="color: red;font-size: 12px;">{{ $errors->first('captcha') }}</span>
                               @endif
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="captcha">
                               <span>{!! captcha_img('flat') !!}</span>
                               <a class="btn-reset btn-refresh"><i
                                           style="padding-right: 20px;color: #cecece" class="fa fa-lg fa-refresh"></i>
                               </a>
                           </div>
                       </div>
                       <div class="form-group">
                       <input type="submit" class="register_btn" value="ثبت نام در دیجی آنلاین">
                       </div>


                   </form>
               </div>

            </div>
            <div class="col-md-6">

                <div class="right_register_box">
                <ul class="ul_register">

                    <li>
                        <span class="icon icon-userbox-cart"></span> <span>سریع تر و ساده تر خرید کنید</span>
                    </li>

                    <li>
                        <span class="icon icon-userbox-list"></span> <span>به سادگی سوابق خرید و فعالیت های خود را مدیریت کنید</span>
                    </li>

                    <li>
                        <span class="icon icon-userbox-love"></span> <span>لیست علاقمندی های خود را بسازید و تغییرات آنها را دنبال کنید</span>
                    </li>

                    <li>
                        <span class="icon  icon-userbox-comment"></span> <span>نقد، بررسی و نظرات خود را با دیگران به اشتراک گذارید</span>
                    </li>


                </ul>
                </div>
            </div>

        </div>

    </div>

@endsection