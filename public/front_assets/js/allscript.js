/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/wayshop/app.js":
/*!*************************************!*\
  !*** ./resources/js/wayshop/app.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('#formlogin').submit(function (evt) {
  if (!/^[a-z][a-z0-9_\.]{2,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/.test($('#email').val())) {
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
    success: function success(data) {
      $('#linear').toggle(3000);

      if (data.status == true) {
        var token = data.token.token;
        var user_id = data.user.id;
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
          success: function success(data) {
            window.location.href = "http://dailyshop.com/";
          }
        });
      }
    },
    error: function error() {
      alert('Error, Please try again!');
    }
  });
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

  if ($('#email2').val().length == 0) {
    $('#email2').focus();
    $('.errorEmail2').css('color', '#dc3545').text('* Email can not be blank!');
    evt.preventDefault();
  } else {
    $('.errorEmail2').css('color', '#20b2aa').html('<i class="fa fa-check-circle-o p-3"></i>');
  }

  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#email2').val())) {
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
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        window.location.href = "http://dailyshop.com/";
      }
    });
  });
  $('.close').click(function () {
    $('#myModal').hide();
  });
  $('#productComment').on('submit', function (e) {
    e.preventDefault();
    var author = document.querySelector("input[name='author']").value;
    var email = document.querySelector("input[name='email']").value;
    var body = document.querySelector("#body").value;
    var product_id = document.querySelector("input[name='product_id']").value;
    $.ajax({
      header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url: "/product-comment",
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        author: author,
        email: email,
        body: body,
        product_id: product_id
      },
      success: function success(data) {
        document.getElementById("productComment").reset();
        $(".aa-review-nav").append("\n          <li>\n          <div class=\"media\">\n          <div class=\"media-left\">\n          <a href=\"#\">\n          <img class=\"media-object\" src=\"front_asset/img/testimonial-img-3.jpg\" alt=\"girl image\">\n          </a>\n          </div>\n          <div class=\"media-body\">\n          <h4 class=\"media-heading\"><strong>".concat(data.author, "</strong> - <span>").concat(data.created_at, "</span></h4>\n          <div class=\"aa-product-rating\">\n          <span class=\"fa fa-star\"></span>\n          <span class=\"fa fa-star\"></span>\n          <span class=\"fa fa-star\"></span>\n          <span class=\"fa fa-star\"></span>\n          <span class=\"fa fa-star-o\"></span>\n          </div>\n          <p>").concat(data.body, "</p>\n          </div>\n          </div>\n          </li>\n          "));
      },
      error: function error() {
        alert('Error, Please try again!');
      }
    });
  });
  $('#commentform').on('submit', function (e) {
    e.preventDefault();
    var author = document.querySelector("input[name='author']").value;
    var email = document.querySelector("input[name='email']").value;
    var url = document.querySelector("input[name='url']").value;
    var body = document.querySelector("#body").value;
    var post_id = document.querySelector("input[name='post_id']").value;
    $.ajax({
      header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url: "/post-comment",
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        author: author,
        email: email,
        url: url,
        body: body,
        post_id: post_id
      },
      success: function success(data) {
        document.getElementById("commentform").reset();
        $(".commentlist").append("\n            <li>\n              <div class=\"media\">\n                <div class=\"media-left\">    \n                    <img class=\"media-object news-img\" src=\"img/testimonial-img-3.jpg\" alt=\"img\">      \n                </div>\n                <div class=\"media-body\">\n                  <h4 class=\"author-name\">".concat(data.author, "</h4>\n                  <span class=\"comments-date\"> ").concat(data.created_at, "</span>\n                  <p>").concat(data.body, "</p>\n                  <a href=\"#\" class=\"reply-btn\">Reply</a>\n                </div>\n              </div>\n            </li>\n        "));
      },
      error: function error() {
        alert('Error, Please try again!');
      }
    });
  });
  $('.addCart').click(function () {
    $('#linear').toggle(100);
    var id = $(this).attr('rel');
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
      success: function success(data) {
        $('#myModal').fadeIn();
        $('#linear').toggle(5000);
        $('.modal-body').html("<p>Added ".concat(data, " to cart!</p>"));
        setTimeout(function () {
          $('#myModal').hide();
        }, 2000);
        dataCart(id);
      },
      error: function error() {
        alert('Error, Please try again!');
      }
    });
  });
  $('.remove').click(function () {
    $('#linear').toggle(100);
    var id = $(this).attr('rel');
    $.ajax({
      header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url: "delete-cart/".concat(id),
      data: {
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        dataCart(id);
        $('#linear').toggle(3000);
        var price = $('.total-product' + id).attr('data-price');
        $('.Subtotal').html('$' + $('.Subtotal').attr('data-total') - price);
        $('.Total').html('$' + $('.Total').attr('data-total') - price);
        $('.cart' + id).html('');
      },
      error: function error() {
        alert('Error, Please try again!');
      }
    });
  });

  var dataCart = function dataCart(id) {
    $.ajax({
      header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'get',
      url: 'cart/get-cart',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id
      },
      success: function success(data) {
        var html = '';
        var total = 0;
        var quantity = 0;
        data.map(function (item) {
          quantity += 1;
          total += item.product_price * item.product_quantity;
          html += "<li class=\"cart".concat(item.id, "\">\n          <a class=\"aa-cartbox-img\" href=\"product-detail/").concat(item.product_slug, "\"><img src=\"front_assets/img/product/").concat(item.product_image, "\" alt=\"img\"></a>\n          <div class=\"aa-cartbox-info\">\n          <h4><a href=\"product-detail/").concat(item.product_slug, "\">").concat(item.product_name, "</a></h4>\n          <p>").concat(item.product_quantity, " x $").concat(item.product_quantity * item.product_price, "</p>\n          </div>\n          <a class=\"aa-remove-product remove\" rel=\"").concat(item.id, "\"><span class=\"fa fa-times\"></span></a>\n          </li>");
        });
        html += "<li>\n        <span class=\"aa-cartbox-total-title\">\n        Total\n        </span>\n        <span class=\"aa-cartbox-total-price\">\n        $".concat(total, "\n        </span>\n        </li>");
        $('.aa-cart-notify').text(quantity);
        $('.list-cart').html(html);
      },
      error: function error() {
        alert('Error, Please try again!');
      }
    });
  };

  $('.billtoship').click(function () {
    $('#linear').toggle(100);

    if (this.checked) {
      $('.shipname').val($('.name').val());
      $('.shipemail').val($('.email').val());
      $('.shipphone').val($('.phone').val());
      $('.shipaddress').val($('.address').val());
      $('.shipcountry').html("<option value=\"".concat($('.country').val(), "\">").concat($('.country').val(), "</option>"));
      $('.shipcity').val($('.city').val());
      $('.shippincode').val($('.pincode').val());
      $('#linear').toggle(2000);
    } else {
      $('.shipname').val('');
      $('.shipemail').val('');
      $('.shipphone').val('');
      $('.shipaddress').val('');
      $('.shipcountry').html("<option value=\"0\">Select Your Country</option>\n        <option value=\"Australia\">Australia</option>\n        <option value=\"Afganistan\">Afganistan</option>\n        <option value=\"Bangladesh\">Bangladesh</option>\n        <option value=\"Belgium\">Belgium</option>\n        <option value=\"Brazil\">Brazil</option>\n        <option value=\"Canada\">Canada</option>\n        <option value=\"China\">China</option>\n        <option value=\"Denmark\">Denmark</option>\n        <option value=\"Vietnam\">Vietnam</option>");
      $('.shipcity').val('');
      $('.shippincode').val('');
      $('#linear').toggle(2000);
    }

    ;
  });
  $('.removeOrder').click(function () {
    $('#linear').toggle(100);

    if (confirm('Order confirmation! For any questions please contact the Daily Shop hotline')) {
      $('#linear').toggle(2000);
      var id = $(this).attr('rel');
      $.ajax({
        header: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: "confirm-order/".concat(id),
        data: {
          _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function success(data) {
          $('.cart' + id).hide();
          $('#messConfirmOrder').show();
          setTimeout(function () {
            $('#messConfirmOrder').fadeOut('slow');
          }, 2000);
        },
        error: function error() {
          alert('Error, Please try again!');
        }
      });
    } else {
      return false;
    }

    ;
  });
  $(window).click(function () {
    $('#sanpham').text('');
  });
  var intervalId; // Fake ajax request. Just for demo

  function make_ajax_request(e) {
    $('#linear').toggle(100);
    var that = this;
    var keyword = $('#keyword').val();
    var html = '';
    $.ajax({
      header: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'get',
      url: "/searchajax/".concat(keyword),
      success: function success(res) {
        if (res.length > 0) {
          res.map(function (item) {
            html += "<li><a href=\"product-detail/".concat(item.slug, ".html\">").concat(item.name, "</a></li>");
          });
        } else {
          html = "<li><a href=\"#\">Empty product</a></li>";
        }

        ;
        $('#sanpham').html(html);
      }
    });
    intervalId = setTimeout(function () {
      $('#linear').toggle(1000);
      $(that).val('');
    }, 3000);
  }

  $('.autocomplete').on('keydown', function () {
    clearInterval(intervalId);
  });
  $('.autocomplete').on('keydown', _.debounce(make_ajax_request, 1300));
});

function selectPayment() {
  $('#linear').toggle(100);

  if ($('#cashdelivery').is(':checked') || $('#paypal').is(':checked')) {
    $('#linear').toggle(1000);
    return true;
  } else {
    alert('Please select a Payment method!');
    return false;
  }

  ;
}

;

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************************!*\
  !*** multi ./resources/js/wayshop/app.js ./resources/sass/app.scss ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! E:\xampp\htdocs\laravelproject\resources\js\wayshop\app.js */"./resources/js/wayshop/app.js");
module.exports = __webpack_require__(/*! E:\xampp\htdocs\laravelproject\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });