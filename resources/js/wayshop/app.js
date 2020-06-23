

$('#formlogin').submit(function (evt) {

  if (!/^[a-z][a-z0-9_\.]{2,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/.test($('#email').val())){
    $('.errorEmail').css('color', '#dc3545').text('* Email can not be blank or Email invalide!');
    $('#email').focus();
    return false;
  } else {
    $('.errorEmail').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  } 

  if ($('#password').val() == '') {
    $('#password').focus();
    $('.errorPass').css('color', '#dc3545').text('* Password can not be blank!');
    return false;
  } else {
    $('.errorPass').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  }
  $('#linear').toggle(100);
  $.ajax({
    header: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'post',
    url: 'api/login',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      email: $('#email').val(),
      password: $('#password').val()
    },
    success: function (data) {
      $('#linear').toggle(3000);
      if (data.status == true) {
        let token = data.token.token;
        let user_id = data.user.id
        localStorage.setItem("token", token);
        localStorage.setItem("name", data.user.name);
        localStorage.setItem("user_id", user_id);
        $.ajax({
          header: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url: '/user/login',
          data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            email: $('#email').val(),
            password: $('#password').val()
          },
          success: function (data) {
           window.location.href = "http://dailyshop.com/";
         }
       });

      }
    },
    error: function () {
      alert('Error, Please try again!');
    }

  })
  evt.preventDefault();
});

$('#formregister').submit(function (evt) {
  if ($('#name2').val().length == 0) {
    $('#name2').focus();
    $('.errorName').css('color', '#dc3545').text('* Họ và tên không được để trống!');
    evt.preventDefault();
  } else {
    $('.errorName').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  } 

  if ($('#email2').val().length == 0){
    $('#email2').focus();
    $('.errorEmail2').css('color', '#dc3545').text('* Email can not be blank!');
    evt.preventDefault();
  } else {
    $('.errorEmail2').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  } 

  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#email2').val())){
    $('.errorEmail2').css('color', '#dc3545').text('* Email invalide!');
    $('#email2').focus();
    evt.preventDefault();
  } else {
    $('.errorEmail2').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  } 

  if ($('#address').val().length == 0) {
    $('#address').focus();
    $('.errorAddress').css('color', '#dc3545').text('* Address can not be blank!');
    evt.preventDefault();
  } else {
    $('.errorAddress').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  } 

  if ($('#city').val().length == 0) {
    $('#city').focus();
    $('.errorCity').css('color', '#dc3545').text('* City can not be blank!');
    evt.preventDefault();
  } else {
    $('.errorCity').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  } 

  if ($('#country').val().length == 0) {
    $('#country').focus();
    $('.errorCountry').css('color', '#dc3545').text('* Country can not be blank!');
    evt.preventDefault();
  } else {
    $('.errorCountry').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  }

  if ($('#pincode').val().length == 0) {
    $('#pincode').focus();
    $('.errorPincode').css('color', '#dc3545').text('* Postcode / ZIP can not be blank!');
    evt.preventDefault();
  } else {
    $('.errorPincode').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  } 

  if ($('#phone').val().length == 0) {
    $('#phone').focus();
    $('.errorPhone').css('color', '#dc3545').text('* Phone can not be blank!');
    evt.preventDefault();
  } else {
    $('.errorPhone').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  } 

  if ($('#password2').val().length == 0) {
    $('#password2').focus();
    $('.errorPass2').css('color', '#dc3545').text('* Password can not be blank!');
    evt.preventDefault();
  } else {
    $('.errorPass2').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  }

  if ($('#pass_conf').val().length == 0) {
    $('#pass_conf').focus();
    $('.errorPass_conf').css('color', '#dc3545').text('* Password Confirm can not be blank!');
    evt.preventDefault();
  } else {
    $('.errorPass_conf').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  } 

});

$(document).ready(function () {
  $('#logout').click(function () {
    $('#linear').toggle(100);
    localStorage.clear();
    $.ajax({
      header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'get',
      url: '/user/logout',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
      },
      success: function (data) {
       window.location.href = "http://dailyshop.com/";
     }
   });

  })

  $('.close').click(function () {
    $('#myModal').hide();
  });


  $('#productComment').on('submit', function(e) {
    e.preventDefault();
    let author = document.querySelector("input[name='author']").value;
    let email = document.querySelector("input[name='email']").value;
    let body = document.querySelector("#body").value;
    let product_id = document.querySelector("input[name='product_id']").value;
    $.ajax({
      header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url: "/product-comment",
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        author: author,
        email:email,
        body:body,
        product_id: product_id
      },
      success: function (data) {
        document.getElementById("productComment").reset();

        $(".aa-review-nav").append(`
          <li>
          <div class="media">
          <div class="media-left">
          <a href="#">
          <img class="media-object" src="front_asset/img/testimonial-img-3.jpg" alt="girl image">
          </a>
          </div>
          <div class="media-body">
          <h4 class="media-heading"><strong>${data.author}</strong> - <span>${data.created_at}</span></h4>
          <div class="aa-product-rating">
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star-o"></span>
          </div>
          <p>${data.body}</p>
          </div>
          </div>
          </li>
          `);
      },
      error: function () {
        alert('Error, Please try again!');
      }

    });
  });


  $('#commentform').on('submit', function(e) {
    e.preventDefault();
    let author = document.querySelector("input[name='author']").value;
    let email = document.querySelector("input[name='email']").value;
    let url = document.querySelector("input[name='url']").value;
    let body = document.querySelector("#body").value;
    let post_id = document.querySelector("input[name='post_id']").value;
    $.ajax({
      header: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url: "/post-comment",
      data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          author: author,
          email:email,
          url:url,
          body:body,
          post_id: post_id
      },
      success: function (data) {
        document.getElementById("commentform").reset();
        $(".commentlist").append(`
            <li>
              <div class="media">
                <div class="media-left">    
                    <img class="media-object news-img" src="img/testimonial-img-3.jpg" alt="img">      
                </div>
                <div class="media-body">
                  <h4 class="author-name">${data.author}</h4>
                  <span class="comments-date"> ${data.created_at}</span>
                  <p>${data.body}</p>
                  <a href="#" class="reply-btn">Reply</a>
                </div>
              </div>
            </li>
        `);
      },
      error: function () {
          alert('Error, Please try again!');
      }

    });
  });

  $('.addCart').click(function () {
    $('#linear').toggle(100);
    let id = $(this).attr('rel');
    $.ajax({
      header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url: 'add-cart',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id
      },
      success: function (data) {
        $('#myModal').fadeIn();
        $('#linear').toggle(5000);
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
    $('#linear').toggle(100);
    let id = $(this).attr('rel');
    $.ajax({
      header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url: `delete-cart/${id}`,
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
      },
      success: function (data) { 
        dataCart(id);
        $('#linear').toggle(3000);
        let price = $('.total-product'+id).attr('data-price');
        $('.Subtotal').html('$'+$('.Subtotal').attr('data-total') - price);
        $('.Total').html('$'+$('.Total').attr('data-total') - price);
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
      type: 'get',
      url: 'http://dailyshop.com/cart/get-cart',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
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
          <a class="aa-cartbox-img" href="product-detail/${item.product_slug}"><img src="front_assets/img/product/${item.product_image}" alt="img"></a>
          <div class="aa-cartbox-info">
          <h4><a href="product-detail/${item.product_slug}">${item.product_name}</a></h4>
          <p>${item.product_quantity} x $${item.product_quantity * item.product_price}</p>
          </div>
          <a class="aa-remove-product remove" rel="${item.id}"><span class="fa fa-times"></span></a>
          </li>`;
        })
        html += `<li>
        <span class="aa-cartbox-total-title">
        Total
        </span>
        <span class="aa-cartbox-total-price">
        $${ total }
        </span>
        </li>`;
        $('.aa-cart-notify').text(quantity);        
        $('.list-cart').html(html);
      },
      error: function () {
        
      }

    })
  };

  $('.billtoship').click(function () {
    $('#linear').toggle(100);
    if (this.checked) {
      $('.shipname').val($('.name').val());
      $('.shipemail').val($('.email').val());
      $('.shipphone').val($('.phone').val());
      $('.shipaddress').val($('.address').val());
      $('.shipcountry').html(`<option value="${$('.country').val()}">${$('.country').val()}</option>`);
      $('.shipcity').val($('.city').val());
      $('.shippincode').val($('.pincode').val());
      $('#linear').toggle(2000);
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
      $('#linear').toggle(2000);
    };
  });
  $('.removeOrder').click(function () {
    $('#linear').toggle(100);
    if (confirm('Order confirmation! For any questions please contact the Daily Shop hotline')) {
     $('#linear').toggle(2000);
     let id = $(this).attr('rel');
     $.ajax({
      header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url: `confirm-order/${id}`,
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
      },
      success: function (data) { 
        $('.cart'+id).hide();
        $('#messConfirmOrder').show();
        setTimeout(function() {
          $('#messConfirmOrder').fadeOut('slow');
        }, 2000);
      },
      error: function () {
        alert('Error, Please try again!');
      }

    });
   } else {
    return false;
  };
});

  $(window).click(function () {
   $('#sanpham').text('');
 }) 
  let intervalId;

      // Fake ajax request. Just for demo
      function make_ajax_request(e){
       $('#linear').toggle(100);
       var that = this;
       let keyword = $('#keyword').val();
       let html = '';
       $.ajax({
        header: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'get',
        url: `/searchajax/${keyword}`,
        success: function (res) { 
          if (res.length > 0) {
            res.map(item => {
              html += `<li><a href="http://dailyshop.com/product-detail/${item.slug}.html">${item.name}</a></li>`;
            });
          } else {
            html = `<li><a href="#">Empty product</a></li>`;
          };
          $('#sanpham').html(html);
        }
      });

       intervalId = setTimeout(function(){
        $('#linear').toggle(1000);
        $(that).val(''); 
      },3000);
     }

     $('.autocomplete')
     .on('keydown', function (){       
      clearInterval(intervalId);             
    });

     $('.autocomplete').on('keydown', _.debounce(make_ajax_request, 1000));

   });

function selectPayment () {
  $('#linear').toggle(100);
  if ($('#cashdelivery').is(':checked') || $('#paypal').is(':checked')) {
    $('#linear').toggle(1000);
    return true;    
  } else {
    alert('Please select a Payment method!');
    return false;
  };
};




