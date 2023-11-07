@component('mail::message')
# Welcome to Our Website

Hi Admin,

Here is VPS enquiry. <br>
Details: <br> 
Name: {{ ucwords($name) }} <br>
Email: {{ $email }} <br>
Contact Number: {{ $phoneNumber }} <br>
<!-- @component('mail::button', ['url' => 'http://example.com'])
Visit Website
@endcomponent -->

Thanks,<br>
{{ config('app.name') }}
@endcomponent