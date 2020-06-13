@extends('layouts.main')

@section('pageTitle', 'Home')    

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
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

  <div class="container mtb">

    <div class="jumbotron">
        <center><h1>Welcome Retro App Tech!</h1>
        <p>Selamat Datang, Website ini membahas mengenai Internet, Computer, Networking, Security, Webdesign. Diulas dengan cara sederhana bisa dimengerti oleh awam sekalipun. </p>

        <p>Website ini juga Menawarkan aplikasi untuk produktivitas Anda, bisnis Anda, gaya hidup Anda, anak Anda untuk menjalani kehidupan yang lebih mudah. </p>
        <p>
          {{-- <a class="btn btn-lg btn-info" href="http://twitter.com/retroapptech/" target="_blank" role="button">Twitter &raquo;</a>
          <a class="btn btn-lg btn-primary" href="https://www.facebook.com/retroapptech/"  target="_blank" role="button">Facebook &raquo;</a> --}}
          
          <a href='https://play.google.com/store/apps/dev?id=5510700109537455120&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'  target="_blank" >
            <img alt='Temukan di Google Play' src='https://play.google.com/intl/en_us/badges/images/generic/id_badge_web_generic.png' width="200" height="80"/></a>
        </p>
        </center>
      </div>

    <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-lg-8">

      @if(!$posts->count())
        <div class="alert alert-warning">
          <p>Nothing Found</p>
        </div>
      @else

        @include('blog.alert')

        @foreach($posts as $post)

        <!-- Blog Post -->

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
        {!! $post->excerpt_html !!}
        <p><a href="{{ route('blog.show', $post->slug) }}">[Read More]</a></p>
        <div class="hline"></div>

        <div class="spacing"></div>

        @endforeach
      @endif

      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        {{ $posts->appends(request()->only(['term']))->links() }}
      </ul>

    </div>

    @include('layouts.sidebar')

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
@endsection