@extends('wayshop.layouts.master')
@section('title')
Product-Detail 
@endsection
@section('content')
<!-- product category -->
<section id="aa-product-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-product-details-area">
          <div class="aa-product-details-content">
            <div class="row">
              <!-- Modal view slider -->
              <div class="col-md-5 col-sm-5 col-xs-12">                              
                <div class="aa-product-view-slider">                                
                  <div id="demo-1" class="simpleLens-gallery-container">
                    <div class="simpleLens-container">
                      <div class="simpleLens-big-image-container"><a data-lens-image="{{ asset('front_assets/img/product/'.$data['Product']->image) }}" class="simpleLens-lens-image"><img width="250" height="270" src="{{ asset('front_assets/img/product/'.$data['Product']->image) }}" class="simpleLens-big-image"></a></div>
                    </div>
                    <div class="simpleLens-thumbnails-container">
                      <a data-big-image="{{ asset('front_assets/img/product/'.$data['Product']->image) }}" data-lens-image="{{ asset('front_assets/img/product/'.$data['Product']->image) }}" class="simpleLens-thumbnail-wrapper" href="#">
                        <img width="50" height="50" class="mt-2 border-info" src="{{ asset('front_assets/img/product/'.$data['Product']->image) }}">
                      </a>
                      @php
                      if (!empty($data['Product']->imageDetail)) {
                         $img = json_decode($data['Product']->imageDetail);
                         foreach ($img as $item) {
                      @endphp
                      <a data-big-image="{{ asset('front_assets/img/product/'.$item) }}" data-lens-image="{{ asset('front_assets/img/product/'.$item) }}" class="simpleLens-thumbnail-wrapper" href="#">
                        <img width="50" height="50" class="mt-2 border-info" src="{{ asset('front_assets/img/product/'.$item) }}">
                      </a>                                    
                      @php
                        }}
                      @endphp
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal view content -->

              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="aa-product-view-content">
                  <h3>{{ $data['Product']->name }}</h3>
                  <div class="aa-price-block">

                    <span class="aa-product-view-price" style="color: #ff6666;font-weight: bold;">${{number_format($data['Product']->price,0,'.',',')}}</span>
                    <p class="aa-product-avilability">Avilability: 
                      @if($data['Product']->quantity > 0)
                      <span>In stock</span>
                      @else
                      <span>Out stock</span>
                      @endif
                    </p>
                  </div>
                  <p>
                    {{ $data['Product']->description }}
                  </p>
                  <h4>Size <span style="color: red">(Updating)</span></h4>
                  <div class="aa-prod-view-size">
                    <a href="#">S</a>
                    <a href="#">M</a>
                    <a href="#">L</a>
                    <a href="#">XL</a>
                  </div>
                  <div class="aa-prod-quantity">
                    <form action="">
                      <label for="">Quantity: </label>
                      <select id="" name="">
                        <option selected="1" value="0">1</option>
                        {{-- <option value="1">2</option>
                        <option value="2">3</option>
                        <option value="3">4</option>
                        <option value="4">5</option> --}}
                      </select>
                    </form>
                    {{-- <p class="aa-prod-category">
                      Category: <a href="#">Polo T-Shirt</a>
                    </p> --}}
                  </div>
                  <div class="aa-prod-view-bottom">
                    <a class="aa-add-to-cart-btn addCart" rel="{{ $data['Product']->id }}" href="javascrip:void(0)">Add To Cart</a>
                    <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                    <a class="aa-add-to-cart-btn" href="#">Compare</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="aa-product-details-bottom">
            <ul class="nav nav-tabs" id="myTab2">
              <li><a href="#description" data-toggle="tab">Description</a></li>
              <li><a href="#review" data-toggle="tab">Reviews</a></li>                
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="description">
                {!! $data['Product']->detail !!}
              </div>
              <div class="tab-pane fade " id="review">
               <div class="aa-product-review-area">
                 <h4>{{ count($data['ProductComment']) }} Reviews for T-Shirt</h4> 
                 <ul class="aa-review-nav">
                     @foreach($data['ProductComment'] as $item)
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="{{ asset('admin_assets/dist/img/avatar5.png') }}" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>{{$item->author}}</strong> - <span>{{$item->created_at}}</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                            </div>
                            <p>{{$item->body}}</p>
                          </div>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                    <div class="aa-blog-navigation">
                    <div class="aa-product-catg-pagination">
                      @if (isset($data['ProductComment']))
                      {{ $data['ProductComment']->links() }}
                      @endif
                    </div>
                    <h4>Add a review</h4>
                    <div class="aa-your-rating">
                     <p>Your Rating <span style="color: red">(Updating)</span></p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form id="productComment" class="aa-review-form">
                    <input type="hidden" name="product_id" value="{{$data['Product']->id}}">
                    <div class="form-group">
                      <label for="message">Your Review</label>
                      <textarea class="form-control" rows="3" id="body" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="author" value="@if (Auth::check())
                        {{ Auth::user()->name }}
                      @endif" required placeholder="Name">
                    </div>  
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" value="@if (Auth::check())
                        {{ Auth::user()->email }}
                      @endif" required placeholder="example@gmail.com">
                    </div>

                    <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                  </form>
                </div>
              </div>            
            </div>
          </div>
          <!-- Related product -->
          <div class="aa-product-related-item">
            <h3>Related Products</h3>
            <ul class="aa-product-catg aa-related-item-slider">
              @foreach($data['productRelated'] as $item)
              <li>
                <figure>
                  <a class="aa-product-img" href="{{url('product-detail/'.$item->slug.'.html')}}"><img width="250" height="270" src="{{ asset('front_assets/img/product/'.$item->image) }}" alt="{{$item->name}}"></a>
                  <a class="aa-add-card-btn addCart" rel="{{$item['id']}}" href="javascrip:void(0)"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="{{url('product-detail',$item->id)}}">{{$item->name}}</a></h4>
                    @if ($item->sale > 0)
                    <span class="aa-product-price">${{number_format($item->sale,0,',','.')}}</span><span class="aa-product-price"><del>${{number_format($item->price,0,',','.')}}</del></span>
                    @else
                    <span class="aa-product-price">${{number_format($item->price,0,',','.')}}</span>
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
                                <a class="simpleLens-lens-image" data-lens-image="{{ 'front_assets/img/view-slider/large/polo-shirt-1.png' }}">
                                  <img src="{{ asset('front_asset/img/view-slider/medium/polo-shirt-1.png') }}" class="simpleLens-big-image">
                                </a>
                              </div>
                            </div>
                            <div class="simpleLens-thumbnails-container">
                              <a href="#" class="simpleLens-thumbnail-wrapper"
                              data-lens-image="{{ 'front_assets/img/view-slider/large/polo-shirt-1.png' }}"
                              data-big-image="img/view-slider/medium/polo-shirt-1.png'">
                              <img src="{{ asset('front_asset/img/view-slider/thumbnail/polo-shirt-1.png') }}">
                            </a>                                    
                            <a href="#" class="simpleLens-thumbnail-wrapper"
                            data-lens-image="{{ 'front_assets/img/view-slider/large/polo-shirt-3.png' }}"
                            data-big-image="img/view-slider/medium/polo-shirt-3.png'">
                            <img src="{{ asset('front_asset/img/view-slider/thumbnail/polo-shirt-3.png') }}">
                          </a>

                          <a href="#" class="simpleLens-thumbnail-wrapper"
                          data-lens-image="{{ 'front_assets/img/view-slider/large/polo-shirt-4.png' }}"
                          data-big-image="img/view-slider/medium/polo-shirt-4.png'">
                          <img src="{{ asset('front_asset/img/view-slider/thumbnail/polo-shirt-4.png') }}">
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
      </div>
      <!-- / quick view modal -->   
    </div>  
  </div>
</div>
</div>
</div>
</section>
<!-- / product category -->

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
          {{-- <div id="app">
            <example-component></example-component>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
{{--    <div id="app2">
            <template>
              <v-app>
                <v-container id="dropdown-example-1" @click="alert">
                  <v-overflow-btn
                    class="my-2"
                    :items="dropdown_font"
                    label="Overflow Btn w/ loading"
                    target="#dropdown-example-1"
                  ></v-overflow-btn>
                 <v-progress-linear
                  indeterminate
                  color="teal"
                  :active="loading"
                ></v-progress-linear>
                </v-container>

              </v-app>  
            </template>
          </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script>
    new Vue({
      el: '#app2',
      vuetify: new Vuetify(),
      data: {
        loading: true,
        dropdown_font: ['Arial', 'Calibri', 'Courier', 'Verdana'],
    },
      methods: {
        alert () {
          this.loading = false;
        }
      }
    });
  </script> --}}
<!-- / Subscribe section -->
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
<div id="app">
</div>
<div id="login">
</div> 
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection
