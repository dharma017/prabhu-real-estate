@component('mail::message')
# Hello, {{ $adminname }}

Name : {{ $name }}

Phone : {{ $phone }}

Email : {{ $mailfrom }}

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
