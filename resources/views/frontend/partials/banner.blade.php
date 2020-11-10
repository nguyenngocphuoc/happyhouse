<!-- start banner Area -->
<section class="banner-area relative" id="home"
	style="background:url({{url('images/'.App\Setting::getBannerImage())}}) no-repeat center !important ">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex text-center align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					{{$title}}
				</h1>
				<a href="{{url('/')}}">
					ホーム
				</a>
				<a href="#">
					-> {{$tab}}
				</a>
				<p class="text-white link-nav">
					<a href="/">{{$content}}</a>
				</p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->