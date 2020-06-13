@extends('layouts.main')
@section('pageTitle',  $post->title )
{{-- @section('og-title',  $post->title )
@section('meta-description',  $post->excerpt_html ) --}}

@section('facebook_meta')
    <meta property="og:url" content="{{ route('blog.show', $post->slug) }}">
    <meta property="og:image" content="{{ $post->image_url }}">
    <meta property="og:description" content="{{ $post->title }}">
@endsection

@section('styles')
  <style>
  img {
    max-width: 100%;
    height: auto;
  }
  </style>
@endsection

@section('content')

<!-- *****************************************************************************************************************
  BLUE WRAP
  ***************************************************************************************************************** -->
  <div id="blue">
    <div class="container">
      <div class="row">
        <h3>Detail Post</h3>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /blue -->

<!-- *****************************************************************************************************************
  BLOG CONTENT
  ***************************************************************************************************************** -->

  <div class="container mtb">
    <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">
      @if($post->image_url)
      <p><img class="img-responsive" src="{{ $post->image_url }}" alt="{{ $post->slug }}"></p>
      @endif
      <a href="{{ route('blog.show', $post->slug) }}"><h3 class="ctitle">{{ $post->title }}</h3></a>
      <p>
          <csmall>Posted: {{ $post->date }}</csmall> |
          <csmall>Category: <a href="{{ route('category', $post->category->slug )}}">{{ $post->category->title }}</a></csmall> |
          <csmall2>By: <a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a> - <a href="{{ route('blog.show', $post->slug) }}#disqus_thread"> 0 Comment </a></csmall2> |
          <csmall><i class="fa fa-eye"></i> {{ $post->view_count }} {{ str_plural('views', $post->view_count)}}</csmall> 
      </p>
      {!! $post->body_html !!}
      <div class="spacing"></div>
      <h6>SHARE:</h6>
      <!-- Go to www.addthis.com/dashboard to customize your tools --> 
      <div class="addthis_inline_share_toolbox"></div>

      <!-- Go to www.addthis.com/dashboard to customize your tools --> 
      <div class="addthis_relatedposts_inline"></div>

      <hr>

      <div class="row">
        <div class="col-xs-2 col-md-2">      
          <a href="{{ route('author', $post->author->slug) }}">
            <img src="{{ $post->author->gravatar() }}" width="100" height="100" alt="{{ $post->author->name }}">
          </a>
        </div>
        <div class="col-xs-10 col-md-10">
          <h4>
            <a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a>
          </h4>
          <p>
            <a href="{{ route('author', $post->author->slug) }}">
              <i class="fa fa-clone"></i>
              <?php $postCount = $post->author->posts()->published()->count();?>
              {{ $postCount }} {{ str_plural('post', $postCount) }}
            </a>
          </p>
          {!! $post->author->bio_html !!}    
        </div>
      </div>
      <br>
      
      <div id="disqus_thread"></div>
      <script>

      /**
      *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
      *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
      
      var disqus_config = function () {
      this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
      this.page.identifier = '{{ $post->slug }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
      };
      
      (function() { // DON'T EDIT BELOW THIS LINE
      var d = document, s = d.createElement('script');
      s.src = 'https://retroapptech.disqus.com/embed.js';
      s.setAttribute('data-timestamp', +new Date());
      (d.head || d.body).appendChild(s);
      })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
      <br>                            

    </div>

    @include('layouts.sidebar')

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection