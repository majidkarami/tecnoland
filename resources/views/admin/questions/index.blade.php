@extends('admin.layout.master')
@section('title', __('مدیریت پرسش های کاربران'))

@section('styles')
    <style>
        .question_box {
            border:1px solid #edeff0;
            width:97%;
            margin:15px auto;
            padding:15px;

        }
        .question_text {
            width:100%;
            height:180px;
        }
        .ansver_box {
            display:none;
        }
        .ansver_box .form-group {
            margin-right: 0px !important;
        }
        .widget-user-header{
            padding: 20px;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">مدیریت پرسش های کاربران</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                @php
                    $jdf=new \App\lib\Jdf();
                @endphp
                @foreach($question as $key=>$value)

                    <div class="question_box" id="question_box_{{ $value->id }}"
                         @if($value->status==0) style="border-color:red" @endif>


                            <div class="widget-user-header bg-aqua-active">
                              <p>پرسش شماره :<span> {{ $value->id }} </span></p>
                              <p> توسط :<span> {{ $value->get_user->username }}  </span></p>
                              <p> در تاریخ :<span> {{ $jdf->jdate('n F y',$value->time) }} </span></p>
                               @if($value->parent_id!=0)
                                <p style="color: #890000;">ثبت شده در پاسخ به پرسش شماره :
                                        <span>
                                        {{ $value->parent_id }}
                                       </span>
                                </p>
                               @endif
                                <p>  عنوان پرسش :<span>  {!!   strip_tags(nl2br($value->question),'<p><br>') !!} </span></p>
                            </div>
                        <div class="widget-user-header bg-aqua-gradient" style="background: white !important;">

                        <p style="color:#933a39;padding-top:10px">ثبت شده برای محصول : <span style="color: #25254b">{{ $value->get_product->title }}</span></p>

                        <p style="padding-top:10px;display: inline-flex;">
                        <span id="status_span_{{ $value->id }}" style="cursor:pointer;"
                              class="btn btn-sm btn-success" onclick="set_status_question('<?= $value->id ?>')">
                            @if($value->status==0)
                                در انتظار تایید
                            @else
                                تایید شده
                            @endif
                        </span>
                            @if($value->parent_id==0)
                                <br>
                                <span style="cursor:pointer;margin-right: 10px;" class="btn btn-sm btn-primary"
                                      onclick="show_form('<?= $value->id ?>')">ارسال پاسخ </span>
                            @endif
                            <br>
                            <span style="cursor:pointer;margin-right: 10px;" class="btn btn-sm btn-danger"
                                  onclick="del_row('<?= $value->id ?>','<?= url('admin/question') ?>','<?= Session::token() ?>')"> حذف </span>
                        </p>
                        </div>

                        <div class="ansver_box" id="add_question_box_{{ $value->id }}">
                            <form method="post" action="{{ route('question.add') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="parent_id" value="{{ $value->id }}">
                                    <input type="hidden" name="product_id" value="{{ $value->get_product->id }}">
                                    <textarea  name="question" rows="7" class="question_text"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">ثبت پاسخ</button>
                                </div>
                            </form>
                        </div>
                    </div>

                @endforeach

                {{ $question->links() }}

            </div>
        </div>
    </section>

@endsection


@section('scripts')

    <script>
        <?php
            $url = url('admin/ajax/set_status_question');
            ?>
            set_status_question = function (id) {
            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url: '{{ $url }}',
                type: 'POST',
                data: 'question_id=' + id,
                success: function (data) {
                    if (data == 'تایید شده') {
                        document.getElementById('question_box_' + id).style.border = '1px solid #edeff0';
                        $("#status_span_" + id).text(data);
                    } else if (data == 'در انتظار تایید') {
                        document.getElementById('question_box_' + id).style.border = '1px solid red';
                        $("#status_span_" + id).text(data);
                    } else {
                        alert(data);
                    }
                }
            });
        };
        show_form = function (id) {
            $('.ansver_box').hide();
            $("#add_question_box_" + id).show();
        }
    </script>


@endsection
