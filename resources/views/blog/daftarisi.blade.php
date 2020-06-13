@extends('layouts.main')
@section('pageTitle', 'Daftar Isi')
@section('content')

<!-- *****************************************************************************************************************
BLUE WRAP
***************************************************************************************************************** -->
<div id="blue">
    <div class="container">
      <div class="row">
        <h3>All Post</h3>
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

        <h4>Daftar Isi</h4>
        <div class="hline"></div>

          @foreach($posts as $post)
            <p><a href="{{ route('blog.show', $post->slug)}}" target="_blank"><i class="fa fa-angle-right"></i> {{ $post->title }}</a></p>
          @endforeach
          

    </div>
    @include('layouts.sidebar')

  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
@endsection