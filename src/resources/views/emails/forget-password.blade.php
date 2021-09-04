
<h2>
    Dear, {{$content['name']}}
</h2>
<p>
    You are receiving this email because we received a password reset request for this mail account.
</p>

<p>
    If you would like to continue.
</p>


<a href="{{url('/')}}/user/reset-password/{{$content->id}}" target="_blank">
    Click Here
</a>
<br>
Thanks,<br>
{{ config('app.name') }}
