<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('pageTitle') - Blog News dan Produk Partner</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta property="fb:pages" content="614484672288060" />	
  <meta property="fb:use_automatic_ad_placement" content="enable=true ad_density=default">
    
  @yield('facebook_meta')

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
     

    {{-- <meta property="og:title" content="@yield('og-title', 'Welcome Retro Apps!')" />
    <meta name="description" content="@yield('meta-description', 'Website ini membahas mengenai Internet, Computer, Networking, Security, Webdesign. Diulas dengan cara sederhana bisa dimengerti oleh awam sekalipun')" /> --}}
    
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900|Lato:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- CDN CSS Files -->  
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet"> --}}
  
  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/prettyphoto/css/prettyphoto.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/hover/hoverex-all.css') }}" rel="stylesheet">

  <!-- CSS tambahan -->
  <link href="{{ asset('backend/plugins/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}" rel="stylesheet">
 
  <!-- Main Stylesheet File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  @yield('styles')

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144725082-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-144725082-1');
  </script>
  <!-- AdSense -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-9052306741159536",
      enable_page_level_ads: true
    });
  </script>

 
</head>
 
<body>

  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" rel="home" href="{{ url('/') }}" title="Retro App Tech Blog News">
            <!-- <img style="max-width:100px; margin-top: -7px;"
                  src="img/favicon.png" > RETRO APP TECH -->
        </a>
  
      </div>
      <div class="navbar-collapse collapse navbar-right">
        <ul class="nav navbar-nav">
          <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('blog') }}">HOME</a></li>
          <li class="{{ Request::segment(1) === 'blog-daftarisi' ? 'active' : '' }}"><a href="{{ route('blog.daftarisi') }}">DAFTAR ISI</a></li>
          {{-- <li><a href="portfolio.html">PORTFOLIO</a></li>
          <li><a href="about.html">ABOUT</a></li> --}}
          <!-- <li><a href="contact.html">CONTACT</a></li> -->

          <?php $currentUser = Auth::user();?>
          @if(! $currentUser == "")
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $currentUser->name }}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('profile') }}">MY PROFILE</a></li>
                <li><a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    LOG OUT
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </li>
              </ul>
            </li> 
          @else
          <li>
              <a href="{{ route('login') }}">LOG IN</a>
          </li>
          @endif
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>


  @yield('content')

  

  <!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
  <div id="footerwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4>About</h4>
          <div class="hline-w"></div>
          <p>Menawarkan Aplikasi untuk produktivitas anda, bisnis anda, lifestyle anda, anak anda untuk hidup yang lebih mudah. 
              Didirikan dengan dedikasi dan cinta.</p>
        </div>
        <div class="col-lg-4">
          <h4>Social Links</h4>
          <div class="hline-w"></div>
          <p>
            {{-- <a href="#"><i class="fa fa-dribbble"></i></a> --}}
            <a href="https://www.facebook.com/retroapptech" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/retroapptech" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.instagram.com/retroapptech" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCQ64yto1AvgVt_cOFA7SwYA?view_as=subscriber" target="_blank"><i class="fa fa-youtube"></i></a> 
            <a href="https://business.google.com/dashboard/l/12537161292423488892?hl=id" target="_blank"><i class="fa fa-google"></i></a> 
            {{-- <a href="#"><i class="fa fa-tumblr"></i></a> --}}
          </p>
        </div>
        <div class="col-lg-4">
          <h4>Our Address</h4>
          <div class="hline-w"></div>
          <p>
            Teges, Bali,<br/> Kota Gianyar,<br/> Kesatuan Republik Indonesia.<br/>
          </p>
        </div>

      </div>
    </div>
  </div>
  <div id="copyrights">
    <div class="container">
      <p>
        &copy; Copyrights <strong>2017-2020</strong>. All Rights Reserved
      </p>
      <div class="credits">
        Dibuat dengan 💖 <a href="http://retroapptech.com/">Retroapptech.com</a>
      </div>
    </div>
  </div>
  <!-- / copyrights -->

  <!-- JavaScript Libraries -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
  {{-- <script src="lib/php-mail-form/validate.js"></script> --}}
  <script src="{{ asset('lib/prettyphoto/js/prettyphoto.js') }}"></script>
  <script src="{{ asset('lib/isotope/isotope.min.js') }}"></script>
  <script src="{{ asset('lib/hover/hoverdir.js') }}"></script>
  <script src="{{ asset('lib/hover/hoverex.min.js') }}"></script>

  <!-- JavaScript Tambahan -->
  <script id="dsq-count-scr" src="//retroapptech.disqus.com/count.js" async></script>
  <script src="{{ asset('backend/plugins/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
  <script>hljs.initHighlightingOnLoad();</script>

  <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d498b164996fa3c"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('js/main.js') }}"></script>

  @yield('script')

</body>

</html>