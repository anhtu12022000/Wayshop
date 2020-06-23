@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Wonderful Dailyshop
        @endcomponent
    @endslot
Dear {{$user->name}}


<h2>{{ $new_ads->title }}</h2>

<p>{{ $new_ads->body }}</p>

<p>Coupons</p>
<ul>
    @foreach ($coupons as $item)
        <li><span style="color: #ff6666;">{{ $item->coupon_code }}</span></li>
    @endforeach
</ul>

Click on the link below to see more! Hurry up to purchase before the end of the promotion!

@component('mail::button', ['url' => url('/')])
View Arrival
@endcomponent

Regards,<br>
Wonderful Company Support Team

{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <!-- footer here -->
        @endcomponent
    @endslot
@endcomponent