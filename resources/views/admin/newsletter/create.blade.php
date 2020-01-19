@extends('admin.layout.master')
@section('title', __(' ایمیل جدید'))

@section("content")

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایمیل جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="subject" value="ایمیل">
                            <div class="form-group input-group">
                                <label for="content">محتوا</label>
                                <textarea id="content" class="form-control" placeholder="متن خود را وارد نمایید"
                                          name="content">{{old("content")}}</textarea>
                                @if($errors->has('content'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('content') }}</span>
                                @endif
                            </div>

                            <label for="role">گیرندگان</label><br>
                            <div class="form-group" style="padding: 10px;display: inline-grid;">
                                <label class="custom-control custom-radio pl-2">
                                    <input class="form-check-input custom-control-input" type="radio"
                                           name="check_mail" value="managers" checked>
                                    مدیران
                                    <span class="custom-control-indicator"></span>
                                </label>
                                <label class="custom-control custom-radio pl-2">
                                    <input class="form-check-input custom-control-input" type="radio"
                                           name="check_mail" value="verified">
                                    کاربران تایید شده
                                    <span class="custom-control-indicator"></span>
                                </label>
                                <label class="custom-control custom-radio pl-2">
                                    <input class="form-check-input custom-control-input" type="radio"
                                           name="check_mail" value="unverified">
                                    کاربران در انتظار تایید
                                    <span class="custom-control-indicator"></span>
                                </label>
                                <label class="custom-control custom-radio pl-2">
                                    <input class="form-check-input custom-control-input" type="radio"
                                           name="check_mail" value="special" id="special">
                                    کاربر خاص
                                    <span class="custom-control-indicator"></span>
                                </label>

                            </div>

                            <div class="row" id="email"  style="display: none;">
                                <div class="col-md-8">
                                    <h5 style="color: #ba5757">ایمیل</h5>
                                    <div class="form-group input-group">
                                        <input type="text" class="form-control" placeholder="" name="email" disabled="true" style="border: 1px solid #c39f9f;">
                                        <span class="input-group-addon" id="basic-addon2" style="border: 1px solid #c39f9f;"><i style="color: #c39f9f;" class="fa fa-envelope"></i></span>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group" style="padding-top: 10px">
                                <button type="submit" class="btn btn-success pull-left">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ url('/admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices, easyimage',
            // uiColor: '#9AB8F3'
        });

        $(".form-check-input").change(function () {
            if (this.value == "special") {
                if (this.checked) {
                    $('input[name=email]').removeAttr('disabled');
                    $('#email').slideToggle()
                }
                if (!this.checked) {
                    $('input[name=email]').attr('disabled', 'true');
                    $('#email').slideToggle();
                }
            } else {
                $('input[name=email]').attr('disabled', 'true');
                if ($('#email').is(":visible")) {
                    $('#email').slideToggle();
                }
            }
        });

    </script>
@endsection
