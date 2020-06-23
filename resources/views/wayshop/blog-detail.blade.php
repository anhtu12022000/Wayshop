@extends('wayshop.layouts.master')
@section('title')
    Blog-Detail 
@endsection
@section('content')


  <!-- Blog Archive -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-9">
                <!-- Blog details -->
                <div class="aa-blog-content aa-blog-details">
                  <article class="aa-blog-content-single">                        
                    <h2><a href="#">{{$data['Post']->title}}</a></h2>
                     <div class="aa-article-bottom">
                      <div class="aa-post-author">
                        Posted By <a href="#">Jackson</a>
                      </div>
                      <div class="aa-post-date">
                        {{$data['Post']->created_at}}
                      </div>
                      <div style="clear: both; padding: 10px;">
                        
                      </div>
                      <div>
                          <p><b><i>{{ $data['Post']->description }}</i></b></p>
                      </div>
                    </div>
                    <figure class="aa-blog-img">
                      <a href="#"><img width="100%" src="{{ asset('front_assets/img/post/'.$data['Post']->image) }}" alt="fashion img"></a>
                    </figure>
                    <p>{{$data['Post']->body}}</p>
                    <div class="blog-single-bottom">
                      <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <div class="blog-single-tag">
                            <span>Tags:</span>
                            <a href="#">Fashion,</a>
                            <a href="#">Beauty,</a>
                            <a href="#">Lifestyle</a>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="blog-single-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                  </article>
                  <!-- blog navigation -->
                  <div class="aa-blog-navigation">
                    <a class="aa-blog-prev" href="#"><span class="fa fa-arrow-left"></span>Prev Post</a>
                    <a class="aa-blog-next" href="#">Next Post<span class="fa fa-arrow-right"></span></a>
                  </div>
                  <!-- Blog Comment threats -->
                  <div class="aa-blog-comment-threat">
                    <h3>Comments (4)</h3>
                    <div class="comments">
                      <ul class="commentlist">
                        @foreach ($data['PostComment'] as $item)
                        <li>
                          <div class="media">
                            <div class="media-left">    
                                <img class="media-object news-img" src="{{ asset('img/testimonial-img-3.jpg') }}" alt="img">      
                            </div>
                            <div class="media-body">
                             <h4 class="author-name">Charlie Balley</h4>
                             <span class="comments-date"> March 26th 2016</span>
                             <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English</p>
                             <a href="#" class="reply-btn">Reply</a>
                            </div>
                          </div>
                        </li>
                        @endforeach
                        </ul>
                      </nav>
                    </div>
                  </div>
                  <!-- blog comments form -->
                  <div id="respond">
                    <h3 class="reply-title">Leave a Comment</h3>
                    <form id="commentform">
                      <input type="hidden" name="post_id" value="{{$data['Post']->id}}">
                      <p class="comment-notes">
                        Your email address will not be published. Required fields are marked <span class="required">*</span>
                      </p>
                      <p class="comment-form-author">
                        <label for="author">Name <span class="required">*</span></label>
                        <input type="text" name="author" value="" size="30" required="required">
                      </p>
                      <p class="comment-form-email">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" name="email" value="" aria-required="true" required="required">
                      </p>
                      <p class="comment-form-url">
                        <label for="url">Website</label>
                        <input type="text" name="url" value="">
                      </p>
                      <p class="comment-form-comment">
                        <label for="comment">Comment</label>
                        <textarea name="body" id="body" cols="45" rows="8" aria-required="true" required="required"></textarea>
                      </p>
                      <p class="form-submit">
                        <input type="submit" name="submit" class="aa-browse-btn" value="Post Comment">
                      </p>        
                    </form>
                  </div>
                </div>
              </div>

              <!-- blog sidebar -->
              <div class="col-md-3">
                <aside class="aa-blog-sidebar">
                  <div class="aa-sidebar-widget">
                    <h3>Category</h3>
                    <ul class="aa-catg-nav">
                      @foreach($data['Cate'] as $item)
                      <li><a href="#">{{$item->name}}</a></li>
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
                        @foreach($data['postRelated'] as $item)
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
