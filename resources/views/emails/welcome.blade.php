@component('mail::message')
<h1>Welcome to Dailyshop</h1>

<p>Tại đây, bạn có thể mua sắm thỏa thích với đầy những ưu đãi từ Dailyshop!</p>

<div>
	<img src="{{ asset('front_assets/img/testimonial-bg-1.jpg') }}" alt="">
</div>

@component('mail::button', ['url' => '/'])
Back to the site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
