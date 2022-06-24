@component('mail::message')
# Application Approved

Your adoption application has been approved!

@component('mail::button', ['url' => $url])
View Application
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
