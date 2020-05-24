@extends('wayshop.layouts.master')
@section('title')
    Account 
@endsection
@section('content')

   <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{ asset('front_assets/img/fashion/fashion-header-bg-8.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{ url('/') }}">Home</a></li>                   
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
@if (Auth::user())
 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area"> 
          <div class="text-center">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif   
          </div>        
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                  @if (session('danger'))
                    <div class="alert alert-danger">{{session('danger')}}</div>
                  @endif
                <h4>Change password</h4>
                @if (session('changePassword'))
                  <div class="alert alert-success">{{session('changePassword')}}</div>
                @endif
                <form action="{{ url('user/change-password/'.Auth::id()) }}" method="post" class="aa-login-form">
                  @csrf
                  <label for="">New password<span>*</span></label>
                   <input type="password" name="password" placeholder="New password">
                   <label for="">Confirm password<span>*</span></label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    <button type="submit" class="aa-browse-btn">Change</button>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">
                  @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                  @endif              
                 <h4>Change infomation</h4>
                 @if (session('changeInformation'))
                  <div class="alert alert-success">{{session('changeInformation')}}</div>
                  @endif
                 <form action="{{ url('user/change-infomation') }}" method="post" class="aa-login-form">
                  @csrf
                    <label for="">Username<span>*</span></label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Username">
                    <label for="">Email address<span>*</span></label>
                    <input type="text" name="email" value="{{ Auth::user()->email }}" placeholder="Email address">
                    <label for="">Address<span>*</span></label>
                    <input type="text" name="address" value="{{ Auth::user()->address }}" placeholder="Your Address">
                    <label for="">City<span>*</span></label>
                    <input type="text" name="city" value="{{ Auth::user()->city }}" placeholder="Your Country">
                    <label for="">Country<span>*</span></label>
                    <select name="country" class="form-control">
                      <option value="0">Select Your Country</option>
                      <option value="1">Australia</option>
                      <option value="2">Afganistan</option>
                      <option value="3">Bangladesh</option>
                      <option value="4">Belgium</option>
                      <option value="5">Brazil</option>
                      <option value="6">Canada</option>
                      <option value="7">China</option>
                      <option value="8">Denmark</option>
                      <option value="9">Egypt</option>
                      <option value="10">India</option>
                      <option value="11">Iran</option>
                      <option value="12">Israel</option>
                      <option value="13">Mexico</option>
                      <option value="14">UAE</option>
                      <option value="15">UK</option>
                      <option value="16">USA</option>
                      <option value="17">Vietnam</option>
                    </select>
                    <label for="">Phone<span>*</span></label>
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="Your Phone">
                    <label for="">Gender<span>*</span></label>
                    <select name="gender" id="" class="form-control">
                      <option value="male">Male</option>
                      <option @if (Auth::user()->gender == 'famale')
                        selected="" 
                      @endif value="famale">Famale</option>
                      <option @if (Auth::user()->gender == 'orther')
                        selected="" 
                      @endif value="orther">Orther</option>
                    </select><br>
                    <button type="submit" class="aa-browse-btn">Change</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>

@else

 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area"> 
          <div class="text-center">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif   
          </div>        
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                  @if (session('danger'))
                    <div class="alert alert-danger">{{session('danger')}}</div>
                  @endif
                <h4>Login</h4>
                 <form action="{{ url('user/login') }}" method="post" class="aa-login-form">
                  @csrf
                  <label for="">Email address<span>*</span></label>
                   <input type="text" name="email" value="{{ old('email') }}" placeholder="Email address">
                   <label for="">Password<span>*</span></label>
                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Password">
                    <button type="submit" class="aa-browse-btn">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" name="remember_token" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">
                  @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                  @endif              
                 <h4>Register</h4>
                 <form action="{{ url('user/register') }}" method="post" class="aa-login-form">
                  @csrf
                    <label for="">Username<span>*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Username">
                    <label for="">Email address<span>*</span></label>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email address">
                    <label for="">Address<span>*</span></label>
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="Your Address">
                    <label for="">City / Town*<span>*</span></label>
                    <input type="text" name="city" value="{{ old('city') }}" placeholder="Your Country">
                    <label for="">Country<span>*</span></label>
                    <select name="country" class="form-control">
                      <option value="0">Select Your Country</option>
                      <option value="1">Australia</option>
                      <option value="2">Afganistan</option>
                      <option value="3">Bangladesh</option>
                      <option value="4">Belgium</option>
                      <option value="5">Brazil</option>
                      <option value="6">Canada</option>
                      <option value="7">China</option>
                      <option value="8">Denmark</option>
                      <option value="9">Egypt</option>
                      <option value="10">India</option>
                      <option value="11">Iran</option>
                      <option value="12">Israel</option>
                      <option value="13">Mexico</option>
                      <option value="14">UAE</option>
                      <option value="15">UK</option>
                      <option value="16">USA</option>
                      <option value="17">Vietnam</option>
                    </select>
                    <label for="">Phone<span>*</span></label>
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Your Phone">
                    <label for="">Gender<span>*</span></label>
                    <select name="gender" id="" class="form-control">
                      <option value="male">Male</option>
                      <option value="famale">Famale</option>
                      <option value="orther">Orther</option>
                    </select><br>
                    <label for="">Password<span>*</span></label>
                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Password">
                    <label for="">Confirm Password<span>*</span></label>
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password">
                    <button type="submit" class="aa-browse-btn">Register</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endif

@endsection