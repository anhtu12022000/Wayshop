@component('mail::message')
<h1>{{ $details['title'] }}</h1>

<p>{{ $details['body'] }}</p>

<div>
	<img src="{{ asset('front_assets/img/testimonial-bg-1.jpg') }}" alt="">
</div>

@component('mail::button', ['url' => url('/')])
Back to the site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
