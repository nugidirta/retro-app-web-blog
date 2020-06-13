<!-- Sidebar Widgets Column -->
<div class="col-lg-4">
 
  <!-- Search Widget -->
  <form action="{{ route('blog') }}">

    <h4>Search</h4>
    <div class="hline"></div>
    <p>
      <br/>
      <div class="input-group">
        <input type="text" class="form-control" value="{{ request('term') }}" name="term" placeholder="Search something">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="submit">Go!</button>
        </span>
      </div>
    </p>    

  </form>

  <div class="spacing"></div>

  <form action="/subscribe" method="POST">
    {{ csrf_field() }}
    <h4>Subscribe</h4>
    <div class="hline"></div>
    <p>
      <br/>
      <div class="input-group">
        <input type="email" class="form-control" name="email" placeholder="E-mail">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="submit">Subscribe</button>
        </span>
      </div>
    </p>    


  </form>

  @if(session('flash'))
    <p>{{ session('flash') }}</p>
  @endif

  <div class="spacing"></div>

  <h4>Categories</h4>
  <div class="hline"></div>
    @foreach($categories as $category)
      <p><a href="{{ route('category', $category->slug)}}"><i class="fa fa-angle-right"></i> {{ $category->title }}</a> <span class="badge badge-theme pull-right">{{ $category->posts->count() }}</span></p>
    @endforeach

  <div class="spacing"></div>

  <h4>Popular Posts</h4>
  <div class="hline"></div>
  <ul class="popular-posts">
    @foreach($popularPosts as $popularPost)
    <li>
      <a href="{{ route('blog.show', $popularPost->slug)}}"><img src="{{ $popularPost->image_thumb_url }}" width=35% alt="Popular Post"></a>
      <p><a href="{{ route('blog.show', $popularPost->slug)}}">{{ substr($popularPost->title, 0, 40) }}</a></p>
      <em>Posted {{ $popularPost->date }}</em>
      <br>
      <em><i class="fa fa-eye"></i> {{ $popularPost->view_count }} {{ str_plural('view', $popularPost->view_count)}}</em>
    </li>
    @endforeach
  </ul>

  <div class="spacing"></div>
  
  <h4>Penawaran Bisnis</h4>
  <div class="hline"></div>
  <br>
  <center>
  <a href="https://indodax.com/ref/nugidirta/1"><img src="https://s3.amazonaws.com/bitcoin.co.id/banner/250x250.jpg" alt=""/></a>
  </center>
  <br>
</div>