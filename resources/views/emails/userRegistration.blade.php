@component('mail::message')
New Registration Notice!!

This is to notify you that a new politician has just registered. The details are

Name: {{$users->lastname}} {{$users->firstname}}<br>
Email: {{$users->email}}<br>
Phone: {{$users->phone}}<br>
{{--@component('mail::button', ['url' => '/auth/login'])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
