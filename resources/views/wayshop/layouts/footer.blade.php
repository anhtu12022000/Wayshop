 <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">Anh Tú</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    


  <div id="myModal" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close">&times;</button>
        <h4 class="modal-title">Notification</h4>
      </div>
      <div class="modal-body">
        <p>Product added to cart!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" class="close">Close</button>
      </div>
    </div>

  </div>
</div>
@section('script')
  <script>
  $(document).ready(function () {
      $('.close').click(function () {
          $('#myModal').hide();
      });
        
      $('.addCart').click(function () {
        let id = $(this).attr('rel');
        $.ajax({
          header: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url: 'add-cart',
          data: {
            _token: '{!! csrf_token() !!}',
            id: id
          },
          success: function (data) {
            $('#myModal').fadeIn();

            $('.modal-body').html(`<p>Added ${data} to cart!</p>`);
            setTimeout(function() {
              $('#myModal').hide();
            }, 2000);
            dataCart(id);
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
          dataCart(id);
          $('.cart'+id).html('');
        },
        error: function () {
          alert('Error, Please try again!');
        }

      })
    });

      let dataCart = (id) => {
          $.ajax({
          header: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url: 'cart/get-cart',
          data: {
            _token: '{!! csrf_token() !!}',
            id: id
          },
          success: function (data) {
            let html = '';
            let total = 0;
            let quantity = 0;
            data.map(item => {
              quantity += 1;
              total += item.product_price * item.product_quantity;
              html += `<li class="cart${item.id}">
                      <a class="aa-cartbox-img" href="product-detail/${item.product_slug}"><img src="front_assets/img/product/${item.product_image}'" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="product-detail/${item.product_slug}">${item.product_name}</a></h4>
                        <p>${item.product_quantity} x ${item.product_quantity * item.product_price}</p>
                      </div>
                      <a class="aa-remove-product remove" rel="${item.id}"><span class="fa fa-times"></span></a>
                    </li>`;
            })
            html += `<li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        ${ total }
                      </span>
                    </li>`;
            $('.aa-cart-notify').text(quantity);        
            $('.list-cart').html(html);
          },
          error: function () {
            alert('Error, Please try again!');
          }

        })
      };

        $('.billtoship').click(function () {
          if (this.checked) {
            $('.shipname').val($('.name').val());
            $('.shipemail').val($('.email').val());
            $('.shipphone').val($('.phone').val());
            $('.shipaddress').val($('.address').val());
            $('.shipcountry').html(`<option value="${$('.country').val()}">${$('.country').val()}</option>`);
            $('.shipcity').val($('.city').val());
            $('.shippincode').val($('.pincode').val());
          } else {
            $('.shipname').val('');
            $('.shipemail').val('');
            $('.shipphone').val('');
            $('.shipaddress').val('');
            $('.shipcountry').html(`<option value="0">Select Your Country</option>
                                  <option value="Australia">Australia</option>
                                  <option value="Afganistan">Afganistan</option>
                                  <option value="Bangladesh">Bangladesh</option>
                                  <option value="Belgium">Belgium</option>
                                  <option value="Brazil">Brazil</option>
                                  <option value="Canada">Canada</option>
                                  <option value="China">China</option>
                                  <option value="Denmark">Denmark</option>
                                  <option value="Vietnam">Vietnam</option>`);
            $('.shipcity').val('');
            $('.shippincode').val('');
          };
       })
      })

    function selectPayment () {
      if ($('#cashdelivery').is(':checked') || $('#paypal').is(':checked')) {
        return true;    
      } else {
        alert('Please select a Payment method!');
        return false;
      };
    }

  </script>
@endsection