@extends('wayshop.layouts.master')
@section('title')
    Checkout 
@endsection
@section('content')


 <!-- Cart view section -->
 <section id="checkout">
  @if (session('mess'))
    <div class="alert alert-danger">{{session('mess')}}</div>
  @endif
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif   
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
         
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    @if (empty(Session::get('couponCode')))
                      <!-- Coupon section -->
                    <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Have a Coupon?
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <input type="text" placeholder="Coupon Code" class="aa-coupon-code">
                          <input type="submit" value="Apply Coupon" class="aa-browse-btn">
                        </div>
                      </div>
                    </div>
                    @endif
                    @if (!Auth::user())
                      <!-- Login section -->
                    <div class="panel panel-default aa-checkout-login">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Client Login 
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptatibus modi pariatur qui reprehenderit asperiores fugiat deleniti praesentium enim incidunt.</p>
                          <form action="{{ url('user/login') }}" method="post">
                            @csrf
                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                            <input type="password" name="password" value="{{ old('password') }}" placeholder="Password">
                            <button type="submit" class="aa-browse-btn">Login</button>
                            <label for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                          </form>
                          <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                        </div>
                      </div>
                    </div>
                    @endif
                  <form action="{{ url('/checkout') }}" method="post">
                    @csrf
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      @if (Auth::user())
                        {{-- expr --}}
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" value="{{ Auth::user()->name }}" class="name" name="name" placeholder="User Name*">
                              </div>                             
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" value="{{ Auth::user()->email }}" class="email" name="email"  placeholder="Email Address*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" name="phone" class="phone" value="{{ Auth::user()->phone }}" placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="address" class="address" rows="3">{{ Auth::user()->address }}</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select name="country" class="country">
                                  <option value="0">Select Your Country</option>
                                  <option @if (Auth::user()->country == 'Australia')
                                      selected="" 
                                  @endif value="Australia">Australia</option>
                                  <option @if (Auth::user()->country == 'Afganistan')
                                      selected="" 
                                  @endif value="Afganistan">Afganistan</option>
                                  <option @if (Auth::user()->country == 'Bangladesh')
                                      selected="" 
                                  @endif value="Bangladesh">Bangladesh</option>
                                  <option @if (Auth::user()->country == 'Belgium')
                                      selected="" 
                                  @endif value="Belgium">Belgium</option>
                                  <option @if (Auth::user()->country == 'Brazil')
                                      selected="" 
                                  @endif value="Brazil">Brazil</option>
                                  <option @if (Auth::user()->country == 'Canada')
                                      selected="" 
                                  @endif value="Canada">Canada</option>
                                  <option @if (Auth::user()->country == 'China')
                                      selected="" 
                                  @endif value="China">China</option>
                                  <option @if (Auth::user()->country == 'Denmark')
                                      selected="" 
                                  @endif value="Denmark">Denmark</option>
                                  <option @if (Auth::user()->country == 'Vietnam')
                                      selected="" 
                                  @endif value="Vietnam">Vietnam</option>
                                </select>
                              </div>                             
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" class="city" value="{{ Auth::user()->city }}" name="city" placeholder="City / Town*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" class="pincode" name="pincode" value="{{ Auth::user()->pincode }}" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div>                                      
                        </div>
                      </div>
                      @else
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" value="{{ old('name') }}" class="name" name="name" placeholder="User Name*">
                              </div>                             
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" value="{{ old('email') }}" class="email" name="email"  placeholder="Email Address*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" name="phone" class="phone" value="{{ old('phone') }}" placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="address" class="address" rows="3">{{ old('address') }}</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select name="country" class="country">
                                  <option value="0">Select Your Country</option>
                                  <option value="Australia">Australia</option>
                                  <option value="Afganistan">Afganistan</option>
                                  <option value="Bangladesh">Bangladesh</option>
                                  <option value="Belgium">Belgium</option>
                                  <option value="Brazil">Brazil</option>
                                  <option value="Canada">Canada</option>
                                  <option value="China">China</option>
                                  <option value="Denmark">Denmark</option>
                                  <option value="Egypt">Egypt</option>
                                  <option value="Vietnam">Vietnam</option>
                                </select>
                              </div>                             
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" value="{{ old('city') }}" class="city" name="city" placeholder="City / Town*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="pincode" class="pincode" value="{{ old('pincode') }}" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div>                                      
                        </div>
                      </div>
                      @endif
                    </div>
                    <!-- Shipping Address -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Shippping Address
                          </a>
                        </h4>
                      </div>
{{--                       @if (Auth::user())
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                         <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                 <input type="text" value="{{ Auth::user()->name }}" name="shipname" placeholder="User Name*">
                              </div>                             
                            </div>
                          </div>  
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" value="{{ Auth::user()->email }}" name="shipemail" placeholder="Email Address*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" value="{{ Auth::user()->phone }}" name="shipphone" placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="shipaddress" rows="3">{{ Auth::user()->address }}</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select name="shipcountry">
                                  <option value="0">Select Your Country</option>
                                  <option value="Australia">Australia</option>
                                  <option value="Afganistan">Afganistan</option>
                                  <option value="Bangladesh">Bangladesh</option>
                                  <option value="Belgium">Belgium</option>
                                  <option value="Brazil">Brazil</option>
                                  <option value="Canada">Canada</option>
                                  <option value="China">China</option>
                                  <option value="Denmark">Denmark</option>
                                  <option value="Egypt">Egypt</option>
                                  <option value="Vietnam">Vietnam</option>
                                </select>
                              </div>                             
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="shipcity" value="{{ Auth::user()->city }}" placeholder="City / Town*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="shippincode" value="{{ Auth::user()->pincode }}" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div>    
                           <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="shipnote" rows="3">{{ old('note') }}</textarea>
                              </div>                             
                            </div>                            
                          </div>              
                        </div>
                      </div>
                      @else --}}
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                         <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                 <input type="text" value="{{ old('name') }}" class="shipname" name="shipname" placeholder="User Name*">
                              </div>                             
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" value="{{ old('email') }}" class="shipemail" name="shipemail" placeholder="Email Address*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" value="{{ old('phone') }}" class="shipphone" name="shipphone" placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="shipaddress" class="shipaddress" rows="3">{{ old('address') }}</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select name="shipcountry" class="shipcountry">
                                  <option value="0">Select Your Country</option>
                                  <option value="Australia">Australia</option>
                                  <option value="Afganistan">Afganistan</option>
                                  <option value="Bangladesh">Bangladesh</option>
                                  <option value="Belgium">Belgium</option>
                                  <option value="Brazil">Brazil</option>
                                  <option value="Canada">Canada</option>
                                  <option value="China">China</option>
                                  <option value="Denmark">Denmark</option>
                                  <option value="Egypt">Egypt</option>
                                  <option value="Vietnam">Vietnam</option>
                                </select>
                              </div>                             
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="shipcity" class="shipcity" value="{{ old('city') }}" placeholder="City / Town*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="shippincode" class="shippincode" value="{{ old('pincode') }}" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div>    
                           <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="shipnote" rows="3">{{ old('note') }}</textarea>
                              </div>                             
                            </div>                            
                          </div>              
                        </div>
                      </div>
{{--                           @endif --}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $total = 0;
                        @endphp
                        @foreach($data['userCart'] as $item)
                        <tr>
                          <td>{{ $item->product_name }} <strong> x  {{ $item->product_quantity }}</strong></td>
                          <td>${{ $item->product_price * $item->product_quantity}}</td>
                        </tr>
                        @php
                           $total += $item->product_price * $item->product_quantity;
                        @endphp
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Subtotal</th>
                          <td>${{ $total }}</td>
                        </tr>
                        <tr>
                          <th>Coupon Discode</th>
                          <td>@if (!empty(Session::get('couponAmount')))
                            ${{ Session::get('couponAmount') }}
                          @else
                            $0
                          @endif
                        </td>
                        </tr>
                         <tr>
                          <th>Tax</th>
                          <td>$10</td>
                        </tr>
                         <tr>
                          <th>Total</th>
                          <td>$ @if ($total)
                            {{ $total + 10 - Session::get('couponAmount') }}
                          @else
                            {{ $total }}
                          @endif
                        </td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div id="billtoship">
                      <input type="checkbox" class="billtoship" value="billtoship" name="billtoship" class="form-check"> Shipping Address Same As Billing Address
                    </div>
                    @if ($total)
                      <input type="submit" value="Checkout" class="aa-browse-btn">      
                    @else 
                      <input type="button" value="You have no orders!" class="aa-browse-btn">   
                    @endif             
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
<div id="app">
</div>
<div id="login">
</div> 
@endsection