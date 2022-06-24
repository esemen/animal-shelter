@component('mail::message')
# Application has been approved

Your vetter application has been approved!

@component('mail::button', ['url' => $url])
Go to your homepage
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
