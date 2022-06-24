@component('mail::message')
# Application Received

Your vetter application received successfully!

@component('mail::button', ['url' => $url])
Go to your homepage
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
