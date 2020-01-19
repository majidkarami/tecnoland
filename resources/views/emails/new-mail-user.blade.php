@component('mail::message')


<h2 style="color: white;" class="button-primary">{!! $newNewsletter->content !!}</h2>


@component('mail::button',  ['url' => route('home')])
    برگشت به خانه
@endcomponent

@component('mail::panel')
    <h3 style="text-align: right;color: #3d4852;"> باتشکر؛   {{ config('app.name') }} </h3>
@endcomponent

@endcomponent