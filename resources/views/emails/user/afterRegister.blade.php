@component('mail::message')
# Welcome

Hi {{$user->name}}
<br>
Welcome to UWHcamp, your account has been created successfully. Now you can choose your best match camp! 

@component('mail::button', ['url' => route('index')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent