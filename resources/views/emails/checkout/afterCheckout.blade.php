@component('mail::message')
# Register Camp : {{$order_detail->Service->title}}

Hi {{$order_detail->user_buyer->name}}
<br>
Thank You for Register on <b>{{$order_detail->Service->title}}</b>, Please see payment instruction by click the button below.

@component('mail::button', ['url' => route('member.request.index')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
