<!DOCTYPE html>
<html lang="ja" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="icon" href="{{ url(App\Setting::getIcon()) }}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>@yield('title',strip_tags(Config::get('const.title')))</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="{{url('css/linearicons.css')}}">
	<link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('css/nice-select.css')}}">
	<link rel="stylesheet" href="{{url('css/ion.rangeSlider.css')}}">
	<link rel="stylesheet" href="{{url('css/ion.rangeSlider.skinFlat.css')}}">
	<link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{url('css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{url('css/main.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
	@yield('style')
</head>

<body>

	<!-- Start Header Area -->
	<header class="default-header">
		<div class="menutop-wrap">
			<div class="menu-top container">
				<div class="d-flex justify-content-end align-items-center">
					<ul class="list">
						<li>{!!App\Setting::getAddress()!!}</li>
						<li>
							<a href="tel:{{App\Setting::getPhoneNumber()}}">TEL
								{{App\Setting::phoneNumberFormat(). "  "}}</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="main-menu">
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
						<a href="{{url('/')}}">
							<img src="{{ url(App\Setting::getLogo()) }}" alt="{{ url(App\Setting::getTitle()) }}"
								title="{{ url(App\Setting::getTitle()) }}" height="120px"
								style="position: absolute; bottom: 0" />
						</a>
					</div>
					<nav id="nav-menu-container">
						<ul class="nav-menu">
							<li class="@if (Request::is('/')) menu-active @endif"><a href="{{url('/')}}">ホーム</a></li>
							<li class="@if (Request::is('about')) menu-active @endif"><a
									href="{{url('about')}}">{{config('properties.text.about_us')}}</a></li>
							<li class="@if (Request::is('property*')) menu-active @endif"><a
									href="{{url('property')}}">{{config('properties.text.property')}}</a></li>
							<li class="@if (Request::is('agents')) menu-active @endif"><a
									href="{{url('agents')}}">{{config('properties.text.agents')}}</a></li>
							<li class="@if (Request::is('contract-flow')) menu-active @endif"><a
									href="{{url('contract-flow')}}">{{config('properties.text.contract_flow')}}</a></li>
							<li class="@if (Request::is('contact')) menu-active @endif"><a
									href="{{url('contact')}}">{{config('properties.text.contact')}}</a></li>
						</ul>
					</nav>
					<!--######## #nav-menu-container -->
				</div>
			</div>
		</div>
	</header>
	<!-- End Header Area -->
	<!-- start yield content Area -->
	@yield('content')
	<!-- End yield content Area -->
	<!-- start footer Area -->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="single-footer-widget">
						{!!App\Setting::getLeftFooter()!!}
					</div>
					<div id="google_translate_element"></div>
				</div>
				<div class="col-lg-5 col-md-12 col-sm-12">
					<div class="single-footer-widget">
						{!!App\Setting::getRightFooter()!!}
						<div class="footer-social d-flex align-items-center">
							<a href="{{App\Setting::getFacebook()}}"><i class="fa fa-facebook"></i></a>
							<a href="{{App\Setting::getTwitter()}}"><i class="fa fa-twitter"></i></a>
							<a href="{{App\Setting::getDribbble()}}"><i class="fa fa-dribbble"></i></a>
							<a href="{{App\Setting::getBehance()}}"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">
					Copyright(c)2020 The Happy House Co., Ltd. All Right Reserved
				</p>
			</div>
		</div>
	</footer>
	{!!App\Setting::getMessenger()!!}
	<!-- End footer Area -->
	<script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
		}
	</script>
	<script src="{{url('js/vendor/jquery-2.2.4.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
		integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
	</script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{url('js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{url('js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{url('js/jquery.nice-select.min.js')}}"></script>
	<script src="{{url('js/jquery.sticky.js')}}"></script>
	<script src="{{url('js/ion.rangeSlider.js')}}"></script>
	<script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{url('js/owl.carousel.min.js')}}"></script>
	<script src="{{url('js/OwlCarousel2Thumbs.min.js')}}"></script>
	<script src="{{url('js/main.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
	</script>
	<script>
		// toastr.options.closeButton = true;
		@if(Session::has('message'))
			var type = "{{ Session::get('alert-type', 'success') }}";
			switch(type){
				case 'info' :
					toastr.info("{{ Session::get('message') }}");
					break;
				case 'warning' :
					toastr.warning("{{ Session::get('message') }}");
					break;
				case 'success' :
					toastr.success("{{ Session::get('message') }}","SUCCESS",{progressBar:true});
					break;
				case 'error' :
					toastr.error("{{ Session::get('message') }}","ERROR",{progressBar:true});
					break;
			}
		@endif
		@if ($errors->any())
			@foreach ($errors->all() as $error)
				toastr.error('{{ $error }}','ERROR!',{ progressBar: true });
			@endforeach
		@endif
	</script>
	@yield('scripts')
</body>

</html>