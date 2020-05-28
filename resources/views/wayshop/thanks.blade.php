@extends('wayshop.layouts.master')
@section('title')
Thanks 
@endsection

@section('content')
 
  
  <!-- 404 error section -->
  <section id="aa-error">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-error-area">
            <h1>Thanks for Purchasing With Us!</h1>
            <h3>YOUR COD ORDER HAS BEEN PLACED</h3>
            <span>Your Order Number is 1 and total payable about is $@if (Session::get('total'))
              {{ Session::get('total') }}
            @endif</span>
            <p>If you see quality products, please recommend us to your friends! thanks.</p>
            <a href="{{ route('home') }}"> Go to Homepage</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / 404 error section -->

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

@endsection