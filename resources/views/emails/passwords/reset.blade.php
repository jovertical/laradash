@component('mail::message')

Hello {{ $user->name ?? 'buddy' }}, 

You recently requested to reset your password for your {{ config('app.name') }} account.

@component('mail::button', compact('url'))
Reset Password
@endcomponent

If you did not request a password reset, please ignore this email.

Regards,<br>
{{ config('app.name') }}

<br>
<hr>
<br>

If you're having trouble clicking the "Reset Password" button, copy and paste 
the URL below into your web browser: <br>
<a href="{{ $url }}" rel="noreferrer noopener">{{ $url }}</a>

@endcomponent
