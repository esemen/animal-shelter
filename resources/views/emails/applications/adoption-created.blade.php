@component('mail::message')
# Application Received

Your adoption application received successfully!

@component('mail::button', ['url' => $url])
View Application
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
