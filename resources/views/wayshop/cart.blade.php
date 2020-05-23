@extends('wayshop.layouts.master')
@section('title')
    Cart 
@endsection
@section('content')

    <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{ asset('img/fashion/fashion-header-bg-8.jpg') }}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{ url('/') }}">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
          <div class="mess"></div>
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Action</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data['userCart'] as $item)
                      <tr class="cart{{ $item->id }}">
                        <td><a class="remove" href="javascript:void(0)" rel="{{ $item->id }}"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="{{ asset('front_assets/img/product/'.$item->product_image) }}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{ $item->product_name }}</a></td>
                        <td>${{ $item->product_price }}</td>
                        <td><input class="aa-cart-quantity" type="number" min="1" data-id="{{ $item->id }}" value="{{ $item->product_quantity }}"></td>
                        <td class="total-product{{ $item->id }}">${{ $item->product_price * $item->product_quantity}}</td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                          <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>$450</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>$450</td>
                   </tr>
                 </tbody>
               </table>
               <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


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

@section('scriptcart')
   <script>

    $('.aa-cart-quantity').change(function () {
        let id = $(this).attr('data-id');
        let quantity = $(this).val();
        $.ajax({
          header: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url: `update-cart/${id}`,
          data: {
            _token: '{!! csrf_token() !!}',
            quantity: quantity
          },
          success: function (data) {
            $(this).val(quantity);  
            $('.total-product'+id).text(`$${data.product_price * data.product_quantity}`);
            $('.mess').html('<span class="alert alert-success">Update Quantity Cart Success</span>');
          },
          error: function () {
            alert('Error, Please try again!');
          }

        })
      });

    $('.remove').click(function () {
        let id = $(this).attr('rel');
        $.ajax({
          header: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url: `delete-cart/${id}`,
          data: {
            _token: '{!! csrf_token() !!}',
          },
          success: function (data) {
            $('.cart'+id).html('');  
            $('.mess').html('<span class="alert alert-success">Delete Cart Success</span>');
          },
          error: function () {
            alert('Error, Please try again!');
          }

        })
      });
  </script>
@endsection