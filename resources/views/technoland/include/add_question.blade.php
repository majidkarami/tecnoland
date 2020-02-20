<div class="row" id="data_question">

    <div style="width:95%;margin:auto">

        @if(Auth::check())
            @if( Session::has('status') )
            <div class="alert alert-info">
                <p style="color:white;text-align:center;">{{ Session::pull('status') }}</p>
            </div>
            @endif
             <p id="answer_p"></p>
           <form action="{{ url('add_question') }}" method="post" id="add_question">
               {{ csrf_field() }}
               <input type="hidden" name="product_id" value="{{ $product_id }}">
               <input type="hidden" name="parent_id" id="parent_id" value="0">
               <textarea style="border: 1px solid #05e4ff;" placeholder="متن پرسش خود را اینجا بنویسید ..." name="question" class="question_test"></textarea>
                   @if(Session::has('error_question'))
                       <span class="has-error">{{ Session::get('error_question') }}</span>
                   @endif
               <div class="parent-btn">
               <button class="dk-btn dk-btn-info">
                   ثبت پرسش
                   <i class="now-ui-icons ui-2_chat-round"></i></button>
               </div>
           </form>

       @else

        <div class="alert alert-info">
            <p style="color:white;text-align:center;">برای ثبت پرسش باید <a href="{{ url('login') }}">لاگین</a> کرده باشید</p>
        </div>

        @endif

        <div style="padding-top:20px;clear:both"></div>

        @if(sizeof($question)>0)


            @foreach($question as $key=>$value)

              <div class="row user_comment_box" style="width:100%;margin:20px auto">

                  <div class="comment_header">

                      <?php
                      $jdf=new \App\lib\Jdf();
                      ?>
                      <span style="padding-right:10px">پرسش</span>

                      <span style="float:left;padding-left: 10px;">توسط {{ $value->get_user->username }}  - {{ $jdf->jdate('n F y',$value->time) }}</span>
                  </div>


                  <div style="padding: 15px;">
                      {!!   strip_tags(nl2br($value->question),'<p><br>') !!}
                  </div>

                  <div class="answer_box">
                      @foreach($value->get_parent as $key2=>$value2)

                          <div style="width:95%;margin:auto">

                              <div style="width:100%;border-bottom: 1px solid #e5e5e5;">
                                  <p>
                                      @if(empty($value2->get_user->name))
                                          ناشناس
                                      @else
                                          {{ $value2->get_user->name }}
                                      @endif
                                  </p>
                                  <p>
                                      {{ $jdf->jdate('n F y',$value2->time) }}
                                  </p>
                              </div>

                              <div style="padding-top:15px;padding-bottom:15px;">
                                  <p>پاسخ:</p>
                                  {!!   strip_tags(nl2br($value2->question),'<p><br>') !!}
                              </div>

                          </div>

                      @endforeach
                  </div>

              </div>
                <p style="float:left;cursor:pointer;color:blue" onclick="add_answer({{ $value->id }})">
                    به این پرسش پاسخ دهید </p>
                <div style="clear: both"></div>
            @endforeach


            {!!  str_replace('id="pagination"','id="question"',$question->render()) !!}

            @else

                <div class="alert alert-danger">
                    <p style="color:white;text-align:center;">تاکنون پرسشی ثبت نشده</p>
                </div>


            @endif
</div>

</div>

<script>
<?php

$url2=url('site/ajax_get_tab_data');
?>
$('#question a').click(function (event) {
event.preventDefault();
    event.preventDefault();
    var url=$(this).attr('href');
    var url=url.split('page=');
    var product_id='<?= $product_id ?>';
    if(url.length==2)
    {
        $("#loading_question").show();
        $("#question_box").hide();
        $.ajaxSetup(
            {
                'headers':{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
            url:'{{ $url2 }}?page='+url[1],
            type:'POST',
            data:'tab_id=question&product_id='+product_id,
            success:function (data) {
                $("#question_box").show();
                $("#loading_question").hide();
                $("#question_box").html(data);
            }
        });
    }

});
add_answer=function (id)
{
    $("#answer_p").html('ارسال پاسخ');
    document.getElementById('parent_id').value=id;
    window.location='#add_question';
};
</script>