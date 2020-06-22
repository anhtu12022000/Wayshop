@extends('wayshop.layouts.master')
@section('title')
    Contact 
@endsection
@section('content')


<!-- start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2>We are wating to assist you..</h2>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quos.</p>
           </div>
           <!-- contact map -->
           <div class="aa-contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8638558813955!2d105.74459841424536!3d21.03813279283566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIHRo4buxYyBow6BuaCBGUFQgUG9seXRlY2huaWMgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1585489584815!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
           <!-- Contact address -->
           <div class="aa-contact-address">
            @if (session('success'))
              <div class="alert alert-success">{{session('success')}}</div>
            @endif
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="{{ url('/contact') }}" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" name="name" value="{{old('name')}}" placeholder="Please Enter Your Name" class="form-control @error('title') is-invalid @enderror">
                          @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" placeholder="Email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                          @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Subject" name="subject" value="{{old('subject')}}" class="form-control @error('subject') is-invalid @enderror">
                          @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Company" name="company" class="form-control">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea value="{{old('message')}}" class="form-control @error('message') is-invalid @enderror" name="message" rows="3" placeholder="Message"></textarea>
                      @error('message')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <button class="aa-secondary-btn">Send</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>DailyShop</h4>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum modi dolor facilis! Nihil error, eius.</p>
                     <p><span class="fa fa-home"></span>Huntsville, AL 35813, USA</p>
                     <p><span class="fa fa-phone"></span>+ 021.343.7575</p>
                     <p><span class="fa fa-envelope"></span>Email: support@dailyshop.com</p>
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

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
<div id="app">
</div>
<div id="login">
</div> 
@endsection