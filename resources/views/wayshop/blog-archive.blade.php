@extends('wayshop.layouts.master')
@section('title')
    Blog-Archive 
@endsection
@section('content')
<!-- catg header banner section -->
<!--   <section id="aa-catg-head-banner">
   <img src="{{ asset('img/fashion/fashion-header-bg-8.jpg') }}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Blog Archive</h2>
        <ol class="breadcrumb">
          <li><a href="{{ url('/') }}">Home</a></li>         
          <li class="active">Blog Archive</li>
        </ol>
      </div>
     </div>
   </div>
  </section> -->
  <!-- / catg header banner section -->

  <!-- Blog Archive -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area aa-blog-archive-2">
            <div class="row">
              <div class="col-md-9">
                <div class="aa-blog-content">
                  <div class="row">
                    @foreach ($data['dataPost'] as $item)              
                    <div class="col-md-4 col-sm-4">
                      <article class="aa-latest-blog-single">
                        <figure class="aa-blog-img">                    
                          <a href="#"><img alt="img" src="{{ asset('front_assets/img/post/'.$item->image) }}"></a>  
                            <figcaption class="aa-blog-img-caption">
                            <span href="#"><i class="fa fa-eye"></i>5K</span>
                            <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                            <a href="#"><i class="fa fa-comment-o"></i>20</a>
                            <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                          </figcaption>                          
                        </figure>
                        <div class="aa-blog-info">
                          <h3 class="aa-blog-title"><a href="#">{{ $item->title }}</a></h3>
                          <p>{{ $item->description }}</p> 
                          <a class="aa-read-mor-btn" href="{{ url('post-detail/'.$item->slug) }}">Read more <span class="fa fa-long-arrow-right"></span></a>
                        </div>
                      </article>
                    </div> 
                    @endforeach
                                      
                  </div>
                </div>
                <!-- Blog Pagination -->
                <div class="aa-blog-archive-pagination">
                  {{ $data['dataPost']->links() }}
                </div>
              </div>
              <div class="col-md-3">
                <aside class="aa-blog-sidebar">
                  <div class="aa-sidebar-widget">
                    <h3>Category</h3>
                    <ul class="aa-catg-nav">
                      @foreach ($data['Cate'] as $item)
                        <li><a href="{{ url('post-detail/'.$item->slug) }}">{{ $item->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="aa-sidebar-widget">
                    <h3>Tags</h3>
                    <div class="tag-cloud">
                      <a href="#">Fashion</a>
                      <a href="#">Ecommerce</a>
                      <a href="#">Shop</a>
                      <a href="#">Hand Bag</a>
                      <a href="#">Laptop</a>
                      <a href="#">Head Phone</a>
                      <a href="#">Pen Drive</a>
                    </div>
                  </div>
                  <div class="aa-sidebar-widget">
                    <h3>Recent Post</h3>
                    <div class="aa-recently-views">
                      <ul>
                        @foreach ($data['dataPosts'] as $item)
                        <li>
                          <a class="aa-cartbox-img" href="{{ url('post-detail/'.$item->slug.'.html') }}"><img src="{{ asset('front_assets/img/post/'.$item->image) }}" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="{{ url('post-detail/'.$item->slug.'.html') }}">{{ $item->title }}</a></h4>
                            <p>{{ $item->created_at }}</p>
                          </div>                    
                        </li>
                        @endforeach
                      </ul>
                    </div>                            
                  </div>
                </aside>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Blog Archive -->


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
<div id="app">
  </div>
  <div id="login">
  </div> 
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection