@extends('wayshop.layouts.master')
@section('title')
    Order review 
@endsection
@section('content')

<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{ asset('img/fashion/fashion-header-bg-8.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Order review </h2>
        <ol class="breadcrumb">
          <li><a href="{{ url('/') }}">Home</a></li>                   
          <li class="active">Order review </li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->



 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
         
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing address
                          </a>
                        </h4>
                      </div>
                  
                        {{-- expr --}}
                      <div id="collapseThree" class="panel-collapse collapse order_review">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <label for="">User Name</label>
                                <input type="text" value="{{ Auth::user()->name }}" disabled="" class="name" name="name" placeholder="User Name*">
                              </div>                             
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <label for="">Email</label>
                                <input type="email" value="{{ Auth::user()->email }}" disabled="" class="email" name="email"  placeholder="Email Address*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <label for="">Phone</label>
                                <input type="tel" name="phone" class="phone"  disabled="" value="{{ Auth::user()->phone }}" placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <label for="">Address</label>
                                <textarea cols="8" name="address" class="address" disabled=""  rows="3">{{ Auth::user()->address }}</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <label for="">Country</label>
                                <select name="country" class="country" disabled="" >
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
                                <label for="">City</label>
                                <input type="text" class="city" value="{{ Auth::user()->city }}"  disabled=""  name="city" placeholder="City / Town*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <label for="">Postcode / ZIP*</label>
                                <input type="text" class="pincode" name="pincode" value="{{ Auth::user()->pincode }}" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div>                                      
                        </div>
                      </div>
                    </div>
                    <!-- Shipping Address -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Shippping Details
                          </a>
                        </h4>
                      </div>

                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                         <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                 <input type="text" value="{{ $data['shipping']->name }}" disabled=""  name="shipname" placeholder="User Name*">
                              </div>                             
                            </div>
                          </div>  
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" value="{{ $data['shipping']->email }}" disabled=""  name="shipemail" placeholder="Email Address*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" value="{{ $data['shipping']->phone }}" name="shipphone"  disabled=""  placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="shipaddress" disabled=""  rows="3">{{ $data['shipping']->address }}</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select name="country" class="country" disabled="" >
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
                                <input type="text" name="shipcity" disabled="" value="{{ $data['shipping']->city }}" placeholder="City / Town*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="shippincode" disabled="" value="{{ $data['shipping']->pincode }}" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div>    
                           <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="shipnote" rows="3">{{ $data['shipping']->note }}</textarea>
                              </div>                             
                            </div>                            
                          </div>              
                        </div>
                      </div>
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
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">                    
                    <label for="cashdelivery"><input type="radio" id="cashdelivery" value="cashdelivery" name="optionsRadios"> Cash on Delivery </label>
                    <label for="paypal"><input type="radio" id="paypal" value="paypal" name="optionsRadios" checked> Via Paypal </label>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">    
                    <input type="submit" value="Place Order" class="aa-browse-btn">                
                  </div>
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

@endsection