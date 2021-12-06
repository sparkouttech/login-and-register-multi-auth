@component('mail::message')
<h2>
    Hello, {{$content['name']}}
</h2>
<p>
    Please click the button below to verify your email address.
</p>

<a style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';border:solid 1px #002b5c;border-radius:5px;box-sizing:border-box;display:inline-block;font-size:14px;font-weight:bold;margin:0;padding:12px 25px;text-decoration:none;text-transform:capitalize;background-color:#002b5c;border-color:#002b5c;color:#ffffff" href="{{url('/')}}/auth/user/update-verification-status/{{$content->id}}" target="_blank">
    Verify Email Address
</a>

<br><br><br><br>
Thanks,<br>
{{ config('app.name') }}

@endcomponent
