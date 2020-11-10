@extends('frontend.master')
@section('style')
<style>
	.container img {
		max-width: 100% !important;
	}

	table {
		width: 100%;
		margin: 0 0 32px;
		font-size: 1.3rem;
	}

	table tr {
		border-top: 2px solid #dee2e7;
		border-bottom: 2px solid #dee2e7;
	}

	table th {
		width: 25%;
	}

	table th {
		text-align: left;
		padding: 15px;
		background: #edf6f3;
		white-space: nowrap;
		border-right: 1px solid #dee2e7;
		vertical-align: middle;
	}

	table td {
		padding: 15px;
		line-height: 1.5;
		vertical-align: middle;
	}
</style>
@endsection
@section('content')
@include('frontend.partials.banner', ['title' => App\Setting::getTitle(), 'content'=>
config('properties.text.slogan'),
'tab'=>config('properties.text.contract_flow')])
<section class="features text-left section-padding" id="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-8" style="padding: 30px">
				{!!$contract_flow!!}
			</div>

			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget post_category_widget">
						<h4 class="widget_title">{{config('properties.text.post_categories')}}</h4>
						<ul class="list cat-list">
							<li><a class="d-flex justify-content-between" href="{{url('/')}}">ホーム</a></li>
							<li><a class="d-flex justify-content-between"
									href="{{url('about')}}">{{config('properties.text.about_us')}}</a></li>
							<li><a class="d-flex justify-content-between"
									href="{{url('property')}}">{{config('properties.text.property')}}</a>
							</li>
							<li><a class="d-flex justify-content-between"
									href="{{url('agents')}}">{{config('properties.text.agents')}}</a>
							</li>
							<li><a class="d-flex justify-content-between"
									href="{{url('contract-flow')}}">{{config('properties.text.contract_flow')}}</a></li>
							<li><a class="d-flex justify-content-between"
									href="{{url('contact')}}">{{config('properties.text.contact')}}</a>
							</li>

						</ul>
						<div class="br"></div>
					</aside>
					<aside class="single-sidebar-widget tag_cloud_widget">
						<h4 class="widget_title">{{config('properties.text.tags_cloud')}}</h4>
						<ul class="list">
							@foreach(explode(',',$tags) as $tag)
							<li><a href="{{url('blog/search') . '?search=' .urlencode('#' . $tag)}}">{{$tag}}</a></li>
							@endforeach
						</ul>
					</aside>
				</div>
			</div>
		</div>
	</div>

</section>
@endsection