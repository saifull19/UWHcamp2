@component('mail::message')
# Your transaction has been confirmed

Hi {{ $order->user_buyer->name }}
<br>
Your Transactions has been confirmed, now you can enjoy the benefits of <b>{{ $order->Service->title }}</b> camp.


@component('mail::button', ['url' => route('member.request.index')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
