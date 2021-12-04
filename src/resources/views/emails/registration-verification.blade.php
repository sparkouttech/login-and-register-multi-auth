@component('mail::message')
<h2>
    Dear, {{$content['name']}}
</h2>
<p>
    verify this mail account.
</p>

<p>
    If you would like to continue.
</p>


<a href="{{url('/')}}/auth/user/update-verification-status/{{$content->id}}" target="_blank">
    Click Here
</a>
<br><br><br><br>
Thanks,<br>
{{ config('app.name') }}

@endcomponent
