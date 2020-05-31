<!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="{{ asset('front_assets/img/flag/english.jpg') }}" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="{{ asset('front_assets/img/flag/french.jpg') }}" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="{{ asset('front_assets/img/flag/english.jpg') }}" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="{{ url('/my-account') }}">My Account</a></li>
                  <li class="hidden-xs"><a href="{{ url('/wishlist') }}">Wishlist</a></li>
                  <li class="hidden-xs"><a href="{{ url('/cart') }}">My Cart</a></li>
                  <li class="hidden-xs"><a href="{{ url('/checkout') }}">Checkout</a></li>
                  @if (Auth::user())
                    <li class="hidden-xs"><a href="{{ route('cart/orderscart') }}">Orders Cart</a></li>
                    <li><a href="{{ url('user/logout') }}">Logout <span>({{ Auth::user()->name }})</span></a></li>
                  @else
                    <li><a href="" data-toggle="modal" data-target="#login-modal">Login</span></a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{ url('/') }}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                {{-- <a href="{{ url('/') }}"><img src="{{ asset('front_assets/img/logo.jpg') }}" alt="logo img"></a> --}} 
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">@if (!empty(Session::get('totalcart')))
                    {{ Session::get('totalcart') }}
                  @endif</span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul class="list-cart">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($data['userCart'] as $item)
                    <li class="cart{{ $item->id }}">
                      <a class="aa-cartbox-img" href="{{ url('product-detail/'.$item['slug']) }}"><img src="{{ asset('front_assets/img/product'.$item->product_image) }}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="{{ url('product-detail/'.$item['slug']) }}">{{ $item->product_name }}</a></h4>
                        <p>{{ $item->product_quantity }} x ${{ $item->product_quantity * $item->product_price }}</p>
                      </div>
                      <a class="aa-remove-product"><span rel="{{ $item->id }}" class="remove fa fa-times"></span></a>
                    </li>
                    @php
                      $total += $item->product_price * $item->product_quantity;
                    @endphp
                    @endforeach

                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        ${{ $total }}
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="{{ url('checkout') }}">Checkout</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->

  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{ url('/') }}">Home</a></li>

              <li><a href="{{ url('/shop') }}">Shop <span class="caret"></span></a>
                <ul class="dropdown-menu">   
                  @foreach($data['Cate'] as $item)             
                  <li><a href="{{ url('/shop') }}">{{$item->name}}<span class="caret"></span></a>
                      <ul class="dropdown-menu">                
                        <li><a href="#">Casual</a></li>
                        <li><a href="#">Sports</a></li>
                        <li><a href="#">Formal</a></li>
                        <li><a href="#">Standard</a></li>                                                
                        <li><a href="#">T-Shirts</a></li>
                        <li><a href="#">Shirts</a></li>
                        <li><a href="#">Jeans</a></li>
                        <li><a href="#">Trousers</a></li>
                        <li><a href="#">And more.. <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Sleep Wear</a></li>
                            <li><a href="#">Sandals</a></li>
                            <li><a href="#">Loafers</a></li>                                      
                          </ul>
                        </li>
                      </ul>
                  </li>
                  @endforeach       
              </ul>
            <li><a href="{{ url('/blog') }}">Blog <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="blog-archive.html">Blog Style 1</a></li>
                  <li><a href="blog-archive-2.html">Blog Style 2</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>                
                </ul>
              </li>

              <li><a href="{{ url('contact') }}">Contact</a></li>
              <li><a href="#">Pages <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="product.html">Shop Page</a></li>
                  <li><a href="product-detail.html">Shop Single</a></li>                
                  <li><a href="404.html">404 Page</a></li>                
                </ul>
              </li>
          </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">

            @foreach($data['Slides'] as $item)
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('front_assets/img/slider/1.jpg') }}" alt="Men slide img" />
              </div>
              <div class="seq-title">
               <span data-seq>Save Up to 75% Off</span>                
                <h2 data-seq>Men Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            @endforeach                 

            <!-- single slide item -->
            @foreach ($data['Slides'] as $value)
            <li>
              <div class="seq-model">
                <img data-seq src="{{ asset('front_assets/img/slides/'.$value->image) }}" alt="{{ $value->title }}" />
              </div>
              <div class="seq-title">
               {{-- <span data-seq>Save Up to 75% Off</span>  --}}               
                <h2 data-seq>{{ $value->title }}</h2>                
                {{-- <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p> --}}
                <a data-seq href="{{ url('shop/'.$value->title) }}" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            @endforeach
            <!-- single slide item -->

          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider