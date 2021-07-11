@component('mail::message')
# Introduction
Welcome <b>{{ $data['data']->name }}</b>
The body of your message. <br>

or Copy this link
<a href="{{ aurl('reset/password/'. $data['token']) }}">{{ aurl('reset/password/'.$data['token']) }}</a>


@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
Click Here To Reset Your Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
