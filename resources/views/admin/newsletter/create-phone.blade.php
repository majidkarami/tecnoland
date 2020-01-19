@extends('admin.layout.master')
@section('title', __(' پیام کوتاه جدید'))

@section('scripts')
<script>
    $(".form-check-input").change(function() {
        if(this.value=="special"){
            if(this.checked) {
                $('input[name=phone]').removeAttr('disabled');
                $('#phone').slideToggle()
            }
            if(!this.checked){
                $('input[name=phone]').attr('disabled','true');
                $('#phone').slideToggle();
            }
       }
       else{
           $('input[name=phone]').attr('disabled','true');
           if($('#phone').is(":visible")){
            $('#phone').slideToggle();
           }
       }
    });
    
</script>
@endsection

@section("content")

<div class="row" id="page-content">
    <header  class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route("admin.home")  }}">
                    <i class="breadcrumb-icon fa fa-angle-left mx-1"></i>خانه</a>
            </li>
            <li class="breadcrumb-item active">
                <a>
                    <i class="breadcrumb-icon fa fa-angle-left mr-1"></i>خبرنامه</a>
            </li>
            <li>
                <a href="{{ route("admin.newsletter.index")  }}"  class="btn bg-outline-orange btn-md float-xs-right">{{__("back")}}</a>
            </li>

        </ol>
    </nav>
    </header>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-head-inverse bg-dark">
                    <h4 class="card-title" style="font-weight: 400">پیام کوتاه جدید</h4>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">خبر با موفقیت افزوده شد</div>
                            @endif

                          <input type="hidden" class="form-control"  name="subject" value="پیام کوتاه">

                            <div class="col-md-8">
                                <fieldset>
                                    <h5>محتوا
                                    </h5>
                                    <div class="form-group input-group">
                                        <textarea data-validation="required" id="content"  class="form-control"  placeholder="متن خود را وارد نمایید"  name="content">{{old("content")}}</textarea>
                                    </div>
                                </fieldset>


                                <h5 style="padding-bottom: 10px">گیرندگان</h5>
                                <fieldset>
                                    <label class="custom-control custom-radio pl-2">
                                        <input class="form-check-input custom-control-input" data-validation="required"  type="radio" name="check_phone"  value="managers" checked>
                                            مدیران
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                        {{-- <label class="custom-control custom-radio pl-2"> فعال
                                            <input type="radio" checked="" value="1" name="status" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                        </label> --}}
                                    <label class="custom-control custom-radio pl-2">
                                        <input class="form-check-input custom-control-input" type="radio" name="check_phone" value="verified">
                                            کاربران تایید شده
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                    <label class="custom-control custom-radio pl-2">
                                        <input class="form-check-input custom-control-input" type="radio" name="check_phone" value="sent">
                                            کاربران در انتظار تایید
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                    <label class="custom-control custom-radio pl-2">
                                        <input class="form-check-input custom-control-input" type="radio" name="check_phone" value="special" id="special">
                                            کاربر خاص
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </fieldset>
                                <div class="row" id="phone"  style="display: none;">
                                    <div class="col-md-6">
                                        <h5>{{__("شماره موبایل")}}
                                        </h5>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" placeholder="" name="phone" disabled="true">
                                            <span class="input-group-addon" id="basic-addon2"><i class="fas fa-phone"></i></span>
                                        </div>
                                    
                                    </div>
                                </div>
                                <br><br>

                                <fieldset>
                                    <div class="form-group input-group">
                                        <input type="submit" class="form-control btn bg-gradient-orange text-white"  placeholder="" value="{{__("create")}}" >
                                    </div>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection