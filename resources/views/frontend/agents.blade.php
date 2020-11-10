@extends('frontend.master')
@section('content')
@include('frontend.partials.banner', ['title' => App\Setting::getTitle(), 'content'=>
config('properties.text.slogan'),
'tab'=>config('properties.text.agents')])
<!-- Start team Area -->
<section class="team-area" id="team">
	<div class="container">
		<div class="row d-flex">
			@foreach($users as $user)
			<div class="col-lg-3 col-md-4 single-team">
				<div class="thumb">
					<img class="img-fluid" src="{{ Config::get('const.rootUrl').'/images/'.$user->photo }}"
						alt="{{$user->name}}" style="height: 300px;width: 255;object-fit: cover;">
					<div class="align-items-center justify-content-center d-flex">
						<a href="{{$user->facebook}}"><i class="fa fa-facebook"></i></a>
						<a href="{{$user->twitter}}"><i class="fa fa-twitter"></i></a>
						<a href="{{$user->instagram}}"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
				<div class="meta-text text-center">
					<h4>{{$user->name}}</h4>
					<p>{{$user->position}}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- End team Area -->
@endsection