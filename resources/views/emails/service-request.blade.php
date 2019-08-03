@component('mail::message')
# Hello, {{ $adminname }}

Name : {{ $name }}

Phone : {{ $phone }}

Email : {{ $mailfrom }}

Purpose : {{ $purpose }}

{{ $message }}

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
