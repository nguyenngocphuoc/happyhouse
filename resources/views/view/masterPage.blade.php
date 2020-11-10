<!DOCTYPE html>
<html lang="vi">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>@yield('title',strip_tags(App\Setting::getTitle()))</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset(\App\Setting::getIcon())}}">

    <meta name="description" content="@yield('description',\App\Setting::getDescription())">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css')}}">
    <link rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/default.min.css">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-175444156-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-175444156-1');
    </script>

  </head>
  <body>
  @php
        $groupCategory = App\GroupCategory::get();
        $arr = [];
        foreach ($groupCategory as $key => $value) {
            $obj = [];
            $listCategory = App\Category::latest()->where('group_categories_id', $value->id)->paginate(5);
            $obj["list"] = $listCategory;
            $obj["categoryInfo"] = $value;
            array_push($arr,$obj);
        }
  @endphp
<div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                <li class="colorlib-active"><a href="{{url('/')}}">Home</a></li>
                @foreach($arr as $value)
                <li>
                    <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$value['categoryInfo']->name}}
                    </a>
                    <div class="dropdown-menu rounded">
                        @foreach($value['list'] as $category)
                        <a class="dropdown-item"
                            href="{{url('/category/'.$category->slug)}}">{{$category->name}}</a>
                        @endforeach
                    </div>
                </li>
                @endforeach
                @if (starts_with(Request::root(), 'http://'))
                    <li><a href="{{'http://service.' . substr(Request::root(), 7)}}">Dịch vụ</a></li>
                @else
                    <li><a href="{{'https://service.' . substr(Request::root(), 8)}}">Dịch vụ</a></li>
                @endif

                <li><a href="{{route('page.about')}}">About us</a></li>
                <li><a href="{{url('contact')}}">Liên hệ</a></li>
            </ul>
        </nav>

        <div class="colorlib-footer">
            <h1 id="colorlib-logo" class="mb-4 landscape-hide"><a href="{{url('/')}}"
                    style="background-image: url({{url('images/bg_1.jpg')}});">{!!\App\Setting::getTitle()!!}</a></h1>
            <div class="mb-4 landscape-hide">
                <h3>Theo dõi {{strip_tags(App\Setting::getTitle())}}</h3>
                <form action="{{route('follows.store')}}" method="POST" class="colorlib-subscribe-form">
                    @csrf
                    <div class="form-group d-flex">
                        <div class="icon"><span class="icon-paper-plane"></span></div>
                        <input type="email" name="email" id="email" required class="form-control"
                            placeholder="Enter Email Address">
                    </div>
                </form>
            </div>
            <a href="{{\App\Setting::getFacebook()}}" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="{{\App\Setting::getYoutube()}}" class="youtube"><i class="fa fa-youtube"></i></a>
            <a href="{{\App\Setting::getTwitter()}}" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="{{\App\Setting::getLinkedin()}}" class="linkedin"><i class="fa fa-linkedin"></i></a>
            <br />
            <div class="fb-like landscape-hide" data-href="{{\App\Setting::getFacebook()}}" data-width="100" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
            <p class="pfooter" style="display:none">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
                with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                    target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </aside>
    <!-- END COLORLIB-ASIDE -->
    <form action="{{ route('page.search') }}" method="GET" role="form" class="search-form mobile-show" style="display:none;padding-top: 70px">
        <div class="form-group">
            <span class="icon icon-search"></span>
            <button id="searchBtn" type="submit" style="display: none;"></button>
            <input id="searchInput" type="text" class="form-control" name="search"
                placeholder="Type a keyword and hit enter" value="<?php if(isset($_GET["search"])) echo $_GET["search"]?>">
            <script>
                var input = document.getElementById("searchInput");
                input.addEventListener("keyup", function (event) {
                    // Number 13 is the "Enter" key on the keyboard
                    if (event.keyCode === 13) {
                        // Cancel the default action, if needed
                        event.preventDefault();
                        // Trigger the button element with a click
                        document.getElementById("searchBtn").click();
                    }
                });
            </script>
        </div>
    </form>
    @yield('content')
</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=622413644906429&autoLogAppEvents=1" nonce="vHzBdLKm"></script>
  <script src="{{ asset('js/jquery.min.js')}}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('js/popper.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('js/aos.js')}}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{ asset('js/scrollax.min.js')}}"></script>
  <script src="{{ asset('js/main.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'success') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;
            
                    case 'success':
                        toastr.success("{{ Session::get('message') }}","SUCCESS",{progressBar:true});
                        break;
            
                    case 'error':
                        toastr.error("{{ Session::get('message') }}","ERROR",{progressBar:true});
                        break;
                }
            @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}','ERROR!',{ progressBar: true });
        @endforeach
    @endif


    /*
    var isLoading = false;
    var page  = 1;
    $(window).scroll(function() {
       var hT = $('#itemlistid').offset().top,
       hH = $('#itemlistid').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
      if (wS + wH >= hT+hH-100){
        if(!isLoading){
          isLoading = true;
          $.ajax({
              type: "GET",
              cache: false,
              url: "{{url('api/load-more')}}/" + page,
              contentType: 'text/html; charset=utf-8',
              success: function(data) {
                page++;
                isLoading = false;
                console.log("loading");
                $('#itemlistid').append(data);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                isLoading = false;
              }
          });
        }

      }
    });
    */
  </script>  
  @yield('script')
  </body>
</html>
