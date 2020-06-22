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

Click on the link below to see more

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