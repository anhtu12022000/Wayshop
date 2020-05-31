@extends('wayshop.layouts.master')
@section('title')
    Cart 
@endsection
@section('content')

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
          <div class="mess"></div>
           <div class="cart-view-table">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Action</th>
                        <th>Product</th>
                        <th>Payment method</th>
                        <th>Date</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $total = 0;
                      ?>
                      @foreach($data['yourOrder'] as $item)
                      <tr class="cart{{ $item->id }}">
                        <td><a class="remove" href="javascript:void(0)" rel="{{ $item->id }}"><fa class="fa fa-close"></fa></a></td>
                        <td><a class="aa-cart-title" href="#">@foreach ($item->ordersPro as $pro)
                          {{ $pro->product_name }}|
                          ${{ $pro->product_price }}|
                          {{ $pro->product_quantity }} item
                        @endforeach</a></td>
                        <td>
                          <a href="#">{{ $item->payment_method }}</a>
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td class="total-product{{ $item->id }}">${{ $item->grand_total }}</td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
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
            $('.Subtotal').text(`$${data.product_price * data.product_quantity}`);
            $('.Total').text(`$${data.product_price * data.product_quantity -@if(!empty(Session::get('couponAmount'))){{ Session::get('couponAmount') }} @else 0 @endif}`);
            $('.mess').html('<span class="alert alert-success">Update Quantity Cart Success</span>');
          },
          error: function () {
            alert('Error, Please try again!');
          }

        })
      });
  </script>
@endsection