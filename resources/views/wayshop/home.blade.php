@extends('wayshop.layouts.master')
@section('title')
Home 
@endsection
@section('content')

<!-- Start Promo section -->
{{-- <section id="aa-promo">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-promo-area">
          <div class="row">
            <!-- promo left -->
            <div class="col-md-5 no-padding">                
              <div class="aa-promo-left">
                <div class="aa-promo-banner">    
                  
                  <a href="{{ url('product-detail/'.$data['cate'][0]['image'][0]->slug.'.html') }}"><img src="{{ asset('front_assets/img/product/'.$data['cate'][0]['image'][0]->image) }}" alt="img"></a>                    
                  <div class="aa-prom-content">
                    <span>75% Off</span>
                    <h4><a href="{{ url('product-detail/'.$data['cate'][0]['image'][0]->slug.'.html') }}">{{ $data['cate'][0]['name'] }}</a></h4>                      
                  </div>
                </div>
              </div>
            </div>
            <!-- promo right -->
            <div class="col-md-7 no-padding">
              <div class="aa-promo-right">

                <div class="aa-single-promo-right">
                  <div class="aa-promo-banner">                      
                    <a href="{{ url('product-detail/'.$data['cate'][1]['image'][0]->slug.'.html') }}"><img src="{{ asset('front_assets/img/product/'.$data['cate'][1]['image'][0]->image) }}" alt="img"> </a>                     
                    <div class="aa-prom-content">
                      <span>Exclusive Item</span>
                      <h4><a href="{{ url('product-detail/'.$data['cate'][1]['image'][0]->slug.'.html') }}">{{ $data['cate'][1]['name'] }}</a></h4>                        
                    </div>
                  </div>
                </div>

                <div class="aa-single-promo-right">
                  <div class="aa-promo-banner">                      
                   <a href="{{ url('product-detail/'.$data['cate'][2]['image'][0]->slug.'.html') }}"> <img src="{{ asset('front_assets/img/product/'.$data['cate'][2]['image'][0]->image) }}" alt="img">   </a>                   
                   <div class="aa-prom-content">
                    <span>New Arrivals</span>
                    <h4><a href="{{ url('product-detail/'.$data['cate'][2]['image'][0]->slug.'.html') }}">{{ $data['cate'][2]['name'] }}</a></h4>                        
                  </div>
                </div>
              </div>
              
              <div class="aa-single-promo-right">
                <div class="aa-promo-banner">                      
                 <a href="{{ url('product-detail/'.$data['cate'][3]['image'][0]->slug.'.html') }}"><img src="{{ asset('front_assets/img/product/'.$data['cate'][3]['image'][0]->image) }}" alt="img">   </a>                   
                 <div class="aa-prom-content">
                  <span>25% Off</span>
                  <h4><a href="{{ url('product-detail/'.$data['cate'][3]['image'][0]->slug.'.html') }}">{{ $data['cate'][3]['name'] }}</a></h4>                        
                </div>
              </div>
            </div>

            <div class="aa-single-promo-right">
              <div class="aa-promo-banner">                      
               <a href="{{ url('product-detail/'.$data['cate'][4]['image'][0]->slug.'.html') }}"><img src="{{ asset('front_assets/img/product/'.$data['cate'][4]['image'][0]->image) }}" alt="img"></a>            
               <div class="aa-prom-content">
                <span>Sale Off</span>
                <h4><a href="{{ url('product-detail/'.$data['cate'][4]['image'][0]->slug.'.html') }}">{{ $data['cate'][4]['name'] }}</a></h4>                        
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
</section> --}}
<!-- / Promo section -->
<!-- Products section -->
<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
              <!-- start prduct navigation -->
              <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#men" data-toggle="tab">Men</a></li>
                <li><a href="#women" data-toggle="tab">Women</a></li>
                <li><a href="#kids" data-toggle="tab">Kids</a></li>
                <li><a href="#bags" data-toggle="tab">Bags</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">

                <!-- Start men product category -->
                <div class="tab-pane fade in active" id="men">
                  <ul class="aa-product-catg">
                    @foreach($data['MenProducts'] as $value)
                    @foreach($value->product as $item)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{ url('product-detail/'.$item['slug'].'.html') }}"><img width="250" height="270" src="{{ asset('front_assets/img/product/'.$item['image']) }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn addCart" rel="{{$item['id']}}" href="javascrip:void(0)"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="{{ url('product-detail/'.$item['slug'].'.html') }}">{{$item['name']}}</a></h4>
                          @if ($item['sale'] == 0)
                          <span class="aa-product-price">${{number_format($item['price'],0,',','.')}}</span>
                          @else
                          <span class="aa-product-price">${{number_format($item['sale'],0,',','.')}}</span><span class="aa-product-price"><del style="color:#000">${{number_format($item['price'],0,',','.')}}</del></span>
                          @endif
                        </figcaption>
                      </figure>                        
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                      </div>
                      <!-- product badge -->
                      @if ($item['sale'] > 0)
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                      @elseif($item['quantity'] == 0)
                      <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                      @else
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                      @endif
                    </li>
                    @endforeach     
                    @endforeach                       
                  </ul>
                  <a class="aa-browse-btn" href="{{ url('/shop') }}">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / men product category -->
                <!-- start women product category -->
                <div class="tab-pane fade" id="women">
                  <ul class="aa-product-catg">
                    @foreach($data['WomenProducts'] as $value)
                    @foreach($value->product as $item)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{ url('product-detail/'.$item['slug'].'.html') }}"><img width="250" height="270" src="{{ asset('front_assets/img/product/'.$item['image']) }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn addCart" rel="{{$item['id']}}" href="javascrip:void(0)"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="{{ url('product-detail/'.$item['slug'].'.html') }}">{{$item['name']}}</a></h4>
                          @if ($item['sale'] == 0)
                          <span class="aa-product-price">${{number_format($item['price'],0,',','.')}}</span>
                          @else
                          <span class="aa-product-price">${{number_format($item['sale'],0,',','.')}}</span><span class="aa-product-price"><del style="color:#000">${{number_format($item['price'],0,',','.')}}</del></span>
                          @endif
                        </figcaption>
                      </figure>                        
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                      </div>
                      <!-- product badge -->
                      @if ($item['sale'] > 0)
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                      @elseif($item['quantity'] == 0)
                      <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                      @else
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                      @endif
                    </li>
                    @endforeach
                    @endforeach                            
                  </ul>
                </div>
                <!-- / kids product category -->
                <div class="tab-pane fade" id="kids">
                  <ul class="aa-product-catg">
                    @foreach($data['KidProducts'] as $value)
                    @foreach($value->product as $item)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{ url('product-detail/'.$item['slug'].'.html') }}"><img width="250" height="270" src="{{ asset('front_assets/img/product/'.$item['image']) }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn addCart" rel="{{$item['id']}}" href="javascrip:void(0)"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="{{ url('product-detail/'.$item['slug'].'.html') }}">{{$item['name']}}</a></h4>
                          @if ($item['sale'] == 0)
                          <span class="aa-product-price">${{number_format($item['price'],0,',','.')}}</span>
                          @else
                          <span class="aa-product-price">${{number_format($item['sale'],0,',','.')}}</span><span class="aa-product-price"><del style="color:#000">${{number_format($item['price'],0,',','.')}}</del></span>
                          @endif
                        </figcaption>
                      </figure>                        
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                      </div>
                      <!-- product badge -->
                      @if ($item['sale'] > 0)
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                      @elseif($item['quantity'] == 0)
                      <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                      @else
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                      @endif
                    </li>
                    @endforeach
                    @endforeach                            
                  </ul>
                </div>
                <!-- start bags product category -->
                <div class="tab-pane fade" id="bags">
                 <ul class="aa-product-catg">
                  @foreach($data['BagsProducts'] as $value)
                  @foreach($value->product as $item)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{ url('product-detail/'.$item['slug'].'.html') }}"><img width="250" height="270" src="{{ asset('front_assets/img/product/'.$item['image']) }}" alt="polo shirt img"></a>
                      <a class="aa-add-card-btn addCart" rel="{{$item['id']}}" href="javascrip:void(0)"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="{{ url('product-detail/'.$item['slug'].'.html') }}">{{$item['name']}}</a></h4>
                        @if ($item['sale'] == 0)
                        <span class="aa-product-price">${{number_format($item['price'],0,',','.')}}</span>
                        @else
                        <span class="aa-product-price">${{number_format($item['sale'],0,',','.')}}</span><span class="aa-product-price"><del style="color:#000">${{number_format($item['price'],0,',','.')}}</del></span>
                        @endif
                      </figcaption>
                    </figure>                        
                    <div class="aa-product-hvr-content">
                      <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                      <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                    </div>
                    <!-- product badge -->
                    @if ($item['sale'] > 0)
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                    @elseif($item['quantity'] == 0)
                    <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    @else
                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                    @endif
                  </li>
                  @endforeach     
                  @endforeach                       
                </ul>
              </div>
              <!-- / bags product category -->
            </div>
            <!-- quick view modal -->                  
            <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">                      
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="row">
                      <!-- Modal view slider -->
                      <div class="col-md-6 col-sm-6 col-xs-12">                              
                        <div class="aa-product-view-slider">                                
                          <div class="simpleLens-gallery-container" id="demo-1">
                            <div class="simpleLens-container">
                              <div class="simpleLens-big-image-container">
                                <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png') }}">
                                  <img src="{{ asset('front_assets/img/view-slider/medium/polo-shirt-1.png') }}" class="simpleLens-big-image">
                                </a>
                              </div>
                            </div>
                            <div class="simpleLens-thumbnails-container">
                              <a href="#" class="simpleLens-thumbnail-wrapper"
                              data-lens-image="img/view-slider/large/polo-shirt-1.png') }}"
                              data-big-image="img/view-slider/medium/polo-shirt-1.png') }}">
                              <img src="{{ asset('front_assets/img/view-slider/thumbnail/polo-shirt-1.png') }}">
                            </a>                                    
                            <a href="#" class="simpleLens-thumbnail-wrapper"
                            data-lens-image="img/view-slider/large/polo-shirt-3.png') }}"
                            data-big-image="img/view-slider/medium/polo-shirt-3.png') }}">
                            <img src="{{ asset('front_assets/img/view-slider/thumbnail/polo-shirt-3.png') }}">
                          </a>

                          <a href="#" class="simpleLens-thumbnail-wrapper"
                          data-lens-image="img/view-slider/large/polo-shirt-4.png') }}"
                          data-big-image="img/view-slider/medium/polo-shirt-4.png') }}">
                          <img src="{{ asset('front_assets/img/view-slider/thumbnail/polo-shirt-4.png') }}">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>T-Shirt</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">$34.99</span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                    <h4>Size</h4>
                    <div class="aa-prod-view-size">
                      <a href="#">S</a>
                      <a href="#">M</a>
                      <a href="#">L</a>
                      <a href="#">XL</a>
                    </div>
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select name="" id="">
                          <option value="0" selected="1">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#">Polo T-Shirt</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <a href="#" class="aa-add-to-cart-btn">View Details</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>                        
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- / quick view modal -->              
    </div>
  </div>
</div>
</div>
</div>
</div>
</section>
<!-- / Products section -->
<!-- banner section -->
<section id="aa-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">        
        <div class="row">
          <div class="aa-banner-area">
            <a href="#"><img src="{{ asset('front_assets/img/fashion-banner.jpg') }}" alt="fashion banner img"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- popular section -->
<section id="aa-popular-category">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-popular-category-area">
            <!-- start prduct navigation -->
            <ul class="nav nav-tabs aa-products-tab">
              <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
              <li><a href="#featured" data-toggle="tab">Featured</a></li> 
              <li><a href="#latest" data-toggle="tab">Latest</a></li>                    
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Start men popular category -->
              <div class="tab-pane fade in active" id="popular">
                <ul class="aa-product-catg aa-popular-slider">
                  @foreach($data['popularProducts'] as $item)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{ url('product-detail/'.$item['slug'].'.html') }}"><img width="250" height="270" src="{{ asset('front_assets/img/product/'.$item['image']) }}" alt="polo shirt img"></a>
                      <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="{{ url('product-detail/'.$item['slug'].'.html') }}">{{$item['name']}}</a></h4>
                        @if ($item['sale'] == 0)
                        <span class="aa-product-price">${{number_format($item['price'],0,',','.')}}</span>
                        @else
                        <span class="aa-product-price">${{number_format($item['sale'],0,',','.')}}</span><span class="aa-product-price"><del style="color:#000">${{number_format($item['price'],0,',','.')}}</del></span>
                        @endif
                      </figcaption>
                    </figure>                        
                    <div class="aa-product-hvr-content">
                      <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                      <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                    </div>
                    <!-- product badge -->
                    @if ($item['sale'] > 0)
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                    @elseif($item['quantity'] == 0)
                    <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    @else
                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                    @endif
                  </li>
                  @endforeach                                                                                     
                </ul>
                <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
              </div>
              <!-- / popular product category -->
              
              <!-- start featured product category -->
              <div class="tab-pane fade" id="featured">
               <ul class="aa-product-catg aa-featured-slider">
                @foreach($data['featuredProducts'] as $item)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{ url('product-detail/'.$item['slug'].'.html') }}"><img width="250" height="270" src="{{ asset('front_assets/img/product/'.$item['image']) }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{{ url('product-detail/'.$item['slug'].'.html') }}">{{$item['name']}}</a></h4>
                      @if ($item['sale'] == 0)
                      <span class="aa-product-price">${{number_format($item['price'],0,',','.')}}</span>
                      @else
                      <span class="aa-product-price">${{number_format($item['sale'],0,',','.')}}</span><span class="aa-product-price"><del style="color:#000">${{number_format($item['price'],0,',','.')}}</del></span>
                      @endif
                    </figcaption>
                  </figure>                        
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                  </div>
                  <!-- product badge -->
                  @if ($item['sale'] > 0)
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                  @elseif($item['quantity'] == 0)
                  <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                  @else
                  <span class="aa-badge aa-hot" href="#">HOT!</span>
                  @endif
                </li>
                @endforeach                                                                                     
              </ul>
              <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
            </div>
            <!-- / featured product category -->

            <!-- start latest product category -->
            <div class="tab-pane fade" id="latest">
              <ul class="aa-product-catg aa-latest-slider">
                @foreach($data['latestProducts'] as $item)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{ url('product-detail/'.$item['slug'].'.html') }}"><img width="250" height="270" src="{{ asset('front_assets/img/product/'.$item['image']) }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{{ url('product-detail/'.$item['slug'].'.html') }}">{{$item['name']}}</a></h4>
                      @if ($item['sale'] == 0)
                      <span class="aa-product-price">${{number_format($item['price'],0,',','.')}}</span>
                      @else
                      <span class="aa-product-price">${{number_format($item['sale'],0,',','.')}}</span><span class="aa-product-price"><del style="color:#000">${{number_format($item['price'],0,',','.')}}</del></span>
                      @endif
                    </figcaption>
                  </figure>                        
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                  </div>
                  <!-- product badge -->
                  @if ($item['sale'] > 0)
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                  @elseif($item['quantity'] == 0)
                  <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                  @else
                  <span class="aa-badge aa-hot" href="#">HOT!</span>
                  @endif
                </li> 
                @endforeach                                                                                       
              </ul>
              <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
            </div>
            <!-- / latest product category -->              
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>
</section>
<!-- / popular section -->
<!-- Support section -->
<section id="aa-support">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-support-area">
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-truck"></span>
              <h4>FREE SHIPPING</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-clock-o"></span>
              <h4>30 DAYS MONEY BACK</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-phone"></span>
              <h4>SUPPORT 24/7</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Support section -->
<!-- Testimonial -->
<section id="aa-testimonial">  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-testimonial-area">
          <ul class="aa-testimonial-slider">
            <!-- single slide -->
            
            <li>
              <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{ asset('front_assets/img/ngao.jpg') }}" alt="testimonial img">
                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                <p>Bài tập lớp môn PHP 3 - Shop bán hàng bằng Laravel.</p>
                <div class="aa-testimonial-info">
                  <p>Anh Tú</p>
                  <span>CEO</span>
                  <a href="https://www.facebook.com/Alaska12022000">https://www.facebook.com/Alaska12022000</a>
                </div>
              </div>
            </li>

            <!-- single slide -->

          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Testimonial -->

<!-- Latest Blog -->
<section id="aa-latest-blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-latest-blog-area">
          <h2>LATEST BLOG</h2>
          <div class="row">
            <!-- single latest blog -->
            @foreach ($data['Posts'] as $value)
            <div class="col-md-4 col-sm-4">
              <div class="aa-latest-blog-single">
                <figure class="aa-blog-img">                    
                  <a href="{{ url('post-detail/'.$value['slug'].'.html') }}"><img src="{{ asset('/front_assets/img/post/'.$value['image']) }}" alt="img"></a>
                  <figcaption class="aa-blog-img-caption">
                    <span href="#"><i class="fa fa-eye"></i>5K</span>
                    <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                    <a href="#"><i class="fa fa-comment-o"></i>20</a>
                    <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                  </figcaption>                          
                </figure>
                <div class="aa-blog-info">
                  <h3 class="aa-blog-title"><a href="{{ url('post-detail/'.$value['slug']) }}">{{ $value['title'] }}</a></h3> 
                  <p>{{ $value['description'] }}</p>
                  <a href="{{ url('post-detail/'.$value['slug']) }}" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                </div>
              </div>
            </div>
            @endforeach
            <!-- single latest blog -->
          </div>
        </div>
      </div>    
    </div>
  </div>
</section>
<!-- / Latest Blog -->

<!-- Client Brand -->
<section id="aa-client-brand">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-client-brand-area">
          <ul class="aa-client-brand-slider">
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/louis.jpg') }}" alt="java img"></a></li>
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/chanel.jpg') }}" alt="jquery img"></a></li>
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/elise.jpg') }}" alt="html5 img"></a></li>
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/lacoste.jpg') }}" alt="css3 img"></a></li>
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/ck.jpg') }}" alt="wordPress img"></a></li>
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/supreme.png') }}" alt="joomla img"></a></li>
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/prada.jpg') }}" alt="java img"></a></li>
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/hermes.jpg') }}" alt="jquery img"></a></li>
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/balencia.jpg') }}" alt="html5 img"></a></li>
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/luxury.jpg') }}" alt="css3 img"></a></li>
            <li><a href="#"><img width="250" height="70" src="{{ asset('front_assets/img/coach.png') }}" alt="wordPress img"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Client Brand -->

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
<!-- / Subscribe section -->
<div id="app">
</div>
<div id="login">
</div> 
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection