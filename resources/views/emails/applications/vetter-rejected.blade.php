@component('mail::message')
# Application has been rejected

Your vetter application has been rejected!

@component('mail::button', ['url' => $url])
Go to your homepage
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
