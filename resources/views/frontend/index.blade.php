@extends('frontend.master')

@section('style')
<link rel="stylesheet" href="{{url('css/detail-style.css')}}">
@endsection

@section('content')
@include('frontend.partials.banner-video', ['title' => App\Setting::getTitle(), 'content'=>
config('properties.text.slogan')])
<!-- Start city Area -->
<section class="city-area section-gap desktop-show">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-10 header-text">
				<h1 class="arrow">{{config('properties.text.vacancy_room_rent_rental')}}</h1>
			</div>
		</div>
		<div class="row">
			<iframe src="{{route('map')}}" width="960" height="720" frameborder="0" style="border:0"
				allowfullscreen=""></iframe>
		</div>
	</div>
</section>
<!-- End city Area -->
<!-- Start property Area -->
<section class="property-area section-gap relative" id="property">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-10 header-text">
				<h1 class="arrow">{{config('properties.text.new_arrival_vacant_room_rent_rental')}}</h1>
				<p>
					{{config('properties.text.someone_who_loves_the_environment_friendly_system_very_much')}}
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@foreach ($newslist as $new)
				<div class="result-box panel panel-default panel-danger">
					<div class="panel-heading">
						【
						@php
						$count = 0;
						foreach ($new->attributelist as $attribute) {
						echo "{$attribute->name}: {$attribute->value} ";
						if ($new->attributelist->count() - 1 >= ++$count) {
						echo " ・ ";
						}
						}
						@endphp
						】
					</div>
					<div class="panel-body">
						<div class="row result-name">
							<div class="col-md-3 keitai">
								<span class="label" style="background-color: {{$new->statuses->color}} !important;">
									{{$new->statuses->name}}
								</span>
							</div>
							<div class="col-md-8">
								<h4 class="list-title">
									<a href="{{url('article/'.$new->slug)}}">{{$new->title}}</a>
								</h4>
							</div>
							<div class="col-md-1"><label><input type="checkbox" class="printChk" name="id[]"
										value="295618654" checked="checked"><span class="check"
										deluminate_imagetype="png"></span></label></div>
						</div>
						<div class="row result-spec">
							<div class="col-md-2">
								<a href="{{url('article/'.$new->slug)}}">
									<img src="{{url('images/'.$new->image)}}" alt="{{$new->title}}"
										class="list-photo img-responsive">
								</a>
							</div>
							<div class="col-md-10 table-responsive">
								<table border="0" cellspacing="0" class="table table-bordered list-spec">
									<tbody>
										<tr class="success">
											<th class="koukokuritu" scope="col">
												{{config('properties.text.status')}}</th>
											<th class="tinryo" scope="col">{{config('properties.text.price')}}
											</th>
											<th class="syozaiti" scope="col">
												{{config('properties.text.address')}}
											</th>
											<th class="kotu" scope="col">{{config('properties.text.category')}}
											</th>
											<th class="menseki" scope="col">
												{{config('properties.text.district')}}</th>
										</tr>
										<tr>
											<td class="koukokuritu">
												{{$new->statuses->name}} </td>
											<td class="tinryo">
												<span class="tinryo-kingaku">
													{{number_format($new->price)}}
												</span>{{config('properties.text.yen')}}<br>
											</td>
											<td class="syozaiti">
												{{$new->address}}
											</td>
											<td class="kotu">{{$new->category->name}}</td>
											<td class="menseki">{{$new->district->name}}
											</td>
										</tr>
									</tbody>
								</table>
								<div class="row">
									<div class="col-md-6">
										<a class="btn btn-primary btn-block"
											href="{{route('page.contact')}}?news_id={{$new->id}}"
											role="button">{{config('properties.text.make_an_appointment')}}</a>
									</div>
									<div class="col-md-6">
										<a class="btn btn-success btn-block" href="{{route('page.contact')}}"
											role="button">{{config('properties.text.contract_now')}}</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<!-- End property Area -->

<!-- Start city Area -->
<section class="city-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-10 header-text">
				<h1 class="arrow">{{config('properties.text.properties_in_various_cities')}}</h1>
				<p>
					{{config('properties.text.extremely_love')}}
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-4 mb-10">
				@if (isset($districts[0]))
				<div class="content city-district" style="width:100%; height:600px">
					<a href="{{route('page.property').'?district='.$districts[0]->romanji_name}}" target="_blank">
						<div class="content-overlay"></div>
						<img class="content-image img-fluid d-block mx-auto"
							style="width:100%; height:600px;object-fit: cover"
							src="{{url('images/'.$districts[0]->image)}}" alt="{{$districts[0]->name}}">
						<div class="content-details fadeIn-bottom">
							<h3 class="content-title">{{$districts[0]->name}}</h3>
						</div>
					</a>
				</div>
				@endif
			</div>
			<div class="col-lg-8 col-md-8 mb-10">
				@if (isset($districts[1]))
				<div class="content city-district" style="width:100%; height:300px">
					<a href="{{route('page.property').'?district='.$districts[1]->romanji_name}}" target="_blank">
						<div class="content-overlay"></div>
						<img class="content-image img-fluid d-block mx-auto"
							style="width:100%; height:100%;object-fit: cover"
							src="{{url('images/'.$districts[1]->image)}}" alt="{{$districts[1]->name}}">
						<div class="content-details fadeIn-bottom">
							<h3 class="content-title">{{$districts[1]->name}}</h3>
						</div>
					</a>
				</div>
				@endif
				<div class="row city-bottom">
					<div class="col-lg-6 col-md-6 mt-30">
						@if (isset($districts[2]))
						<div class="content city-district" style="width:100%; height:270px">
							<a href="{{route('page.property').'?district='.$districts[2]->romanji_name}}"
								target="_blank">
								<div class="content-overlay"></div>
								<img class="content-image img-fluid d-block mx-auto"
									style="width:100%; height:100%;object-fit: cover"
									src="{{url('images/'.$districts[2]->image)}}" alt="{{$districts[2]->name}}">
								<div class="content-details fadeIn-bottom">
									<h3 class="content-title">{{$districts[2]->name}}</h3>
								</div>
							</a>
						</div>
						@endif
					</div>
					<div class="col-lg-6 col-md-6 mt-30">
						@if (isset($districts[3]))
						<div class="content city-district" style="width:100%; height:270px">
							<a href="{{route('page.property').'?district='.$districts[3]->romanji_name}}"
								target="_blank">
								<div class="content-overlay"></div>
								<img class="content-image img-fluid d-block mx-auto"
									style="width:100%; height:100%;object-fit: cover"
									src="{{url('images/'.$districts[3]->image)}}" alt="{{$districts[3]->name}}">
								<div class="content-details fadeIn-bottom">
									<h3 class="content-title">{{$districts[3]->name}}</h3>
								</div>
							</a>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End city Area -->

<!-- End About Area -->
<br>
<br>
<br>
@endsection