@extends('frontend.master')
@section('style')
<link rel="stylesheet" href="{{url('css/detail-style.css')}}">
<style>
	.row {
		margin-right: 0px !important;
	}

	.row .col-md-9,
	.row .col-md-3 {
		padding-right: 0px !important;
	}
</style>
@endsection
@section('content')
@include('frontend.partials.banner', ['title' => App\Setting::getTitle(), 'content'=>
config('properties.text.slogan'),
'tab'=>config('properties.text.property')])

<!-- Start property Area -->
<section class="property-area relative p_120" id="property" style="margin-top: 50px">
	<div class="container main">
		<div style="text-align: center">
			<h1 class="arrow">{{config('properties.text.new_vacant_rental_property')}}</h1>
		</div>
		<div class="search-field border rounded hidden-md-show" style="margin-top: 20px">
			<form class="search-form" action="{{route('page.property')}}">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-xs-6">
						<select name="district" class="app-select form-control" required>
							<option data-display="{{config('properties.text.district')}}">
								{{config('properties.text.district')}}</option>
							@foreach($districts as $district)
							<option value="{{ $district->romanji_name }}" @if($district->romanji_name ==
								app('request')->input('district'))
								{{'selected'}}
								@endif)>
								{{ $district->name }}
							</option>
							@endforeach
						</select>
					</div>
					<div class="col-lg-3 col-md-6 col-xs-6">
						<select name="category" class="app-select form-control" required>
							<option data-display="{{config('properties.text.type')}}">
								{{config('properties.text.type')}}
							</option>
							@foreach($categories as $category)
							<option value="{{ $category->id }}" @if($category->id == app('request')->input('category'))
								{{'selected'}}
								@endif)>
								{{ $category->name }}
							</option>
							@endforeach
						</select>
					</div>
					<div class="col-lg-3 col-md-6 col-xs-6">
						<select name="room_amount" class="app-select form-control" required>
							<option data-display="{{config('properties.text.room_count')}}">
								{{config('properties.text.room_count')}}
							</option>
							<option value="1" @if(app('request')->input('room_amount') == '1') selected
								@endif>{{config('properties.text.1_room')}}
							</option>
							<option value="2" @if(app('request')->input('room_amount') == '2') selected
								@endif>{{config('properties.text.2_room')}}
							</option>
							<option value="3" @if(app('request')->input('room_amount') == '3') selected
								@endif>{{config('properties.text.3_room')}}
							</option>
						</select>
					</div>
					<div class="col-lg-3 col-md-6 col-xs-6">
						<select name="floor_amount" class="app-select form-control" required>
							<option data-display="{{config('properties.text.floor_count')}}">
								{{config('properties.text.floor_count')}}
							</option>
							<option value="1" @if(app('request')->input('floor_amount') == '1') selected
								@endif>{{config('properties.text.1_floor')}}
							</option>
							<option value="2" @if(app('request')->input('floor_amount') == '2') selected
								@endif>{{config('properties.text.2_floor')}}
							</option>
							<option value="3" @if(app('request')->input('floor_amount') == '3') selected
								@endif>{{config('properties.text.3_floor')}}
							</option>
						</select>
					</div>
					<div class="col-lg-4 range-wrap">
						<p>{{config('properties.text.price_range')}} ({{config('properties.text.yen')}}):</p>
						<input type="text" id="range" value="" name="price" />
					</div>
					<div class="col-lg-4 range-wrap">
						<p>{{config('properties.text.area_range')}} :</p>
						<input type="text" id="range2" value="" name="acreage" />
					</div>
					<div class="col-lg-4 d-flex justify-content-end">
						<button class="primary-btn">{{config('properties.text.search')}}<span
								class="lnr lnr-arrow-right"></span></button>
					</div>
				</div>
			</form>
		</div>
		<!-- Pagination -->
		{!! $newslist->appends(request()->input())->links() !!}
		<br>
		<div class="row">
			<div class="col-md-3 hidden-md-down">
				<div id="sidebar">
					@foreach ($download_files as $download_file)
					<p><a href="{{url("file/".$download_file->file)}}" download><img class="maxwidth"
								src="{{url("file/".$download_file->image)}}" alt="{{$download_file->title}}"></a></p>
					@endforeach
					<form method="get" action="{{route('page.property')}}">
						<h3>{{config('properties.text.district')}}</h3>
						<div class="form-group">
							<select name="district" class="app-select form-control" required>
								<option data-display="{{config('properties.text.district')}}">
									{{config('properties.text.district')}}</option>
								@foreach($districts as $district)
								<option value="{{ $district->romanji_name }}" @if($district->romanji_name ==
									app('request')->input('district'))
									{{'selected'}}
									@endif)>
									{{ $district->name }}
								</option>
								@endforeach
							</select>
						</div>
						<br>
						<h3>{{config('properties.text.type')}}</h3>
						<div class="form-group">
							<select name="category" class="app-select form-control" required>
								<option data-display="{{config('properties.text.type')}}">
									{{config('properties.text.type')}}
								</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}" @if($category->id ==
									app('request')->input('category'))
									{{'selected'}}
									@endif)>
									{{ $category->name }}
								</option>
								@endforeach
							</select>
						</div>
						<br>
						<h3>{{config('properties.text.price_range')}}</h3>
						<div class="form-group">
							<select name="price" class="app-select form-control" required>
								<option
									value="{{ config('properties.priceRange.min') . ';' . config('properties.priceRange.max') }}"
									data-display="{{config('properties.text.price_range')}}">
									{{config('properties.text.price_range')}}
								</option>
								@foreach(config('properties.priceDropdown') as $key => $price)
								<option value="{{ $price }}" @if($price==app('request')->input('price'))
									{{'selected'}}
									@endif)>
									{{ $key }}
								</option>
								@endforeach
							</select>
						</div>
						<br>
						<h3>{{config('properties.text.area_range')}}</h3>
						<div class="form-group">
							<select name="acreage" class="app-select form-control" required>
								<option
									value="{{ config('properties.acreageRange.min') . ';' . config('properties.acreageRange.max') }}"
									data-display="{{config('properties.text.area_range')}}">
									{{config('properties.text.area_range')}}
								</option>
								@foreach(config('properties.acreageDropdown') as $key => $acreage)
								<option value="{{ $acreage }}" @if($acreage==app('request')->input('acreage'))
									{{'selected'}}
									@endif)>
									{{ $key }}
								</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-danger form-control"
								type="submit">{{config('properties.text.search')}}</button>
						</div>
					</form>
					<div class="sideWidget" id="text-5">
						<div class="textwidget">
							{!!App\Setting::getFeeds()!!}
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
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

		<br>
		<!-- Pagination -->
		{!! $newslist->appends(request()->input())->links() !!}
	</div>
</section>
<!-- End property Area -->
<!-- Start city Area -->
<section class="city-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-10 header-text">
				<h1>{{config('properties.text.properties_in_various_cities')}}</h1>
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
@endsection

@section('scripts')
@php
$priceRange = explode(";", app('request')->input('price'));
$price_min = app('request')->has('price') && count($priceRange) >= 2 ? $priceRange[0] :
config('properties.priceRange.min');
$price_max = app('request')->has('price') && count($priceRange) >= 2 ? $priceRange[1] :
config('properties.priceRange.max');
$acreageRange = explode(";", app('request')->input('acreage'));
$acreage_min = app('request')->has('acreage') && count($acreageRange) >= 2 ? $acreageRange[0] :
config('properties.acreageRange.min');
$acreage_max = app('request')->has('acreage') && count($acreageRange) >= 2 ? $acreageRange[1] :
config('properties.acreageRange.max');
@endphp
<script>
	$("#range").ionRangeSlider({
		hide_min_max: true,
		keyboard: true,
		min: {{config('properties.priceRange.min')}},
		max: {{config('properties.priceRange.max')}},
		from: {{$price_min}},
		to: {{$price_max}},
		type: 'double',
		step: 1,
		prefix: "円 ",
		grid: true
	});
	$("#range2").ionRangeSlider({
		hide_min_max: true,
		keyboard: true,
		min: {{config('properties.acreageRange.min')}},
		max: {{config('properties.acreageRange.max')}},
		from: {{$acreage_min}},
		to: {{$acreage_max}},
		type: 'double',
		step: 1,
		prefix: "",
		grid: true
	});
	$("#range3").ionRangeSlider({
		hide_min_max: true,
		keyboard: true,
		min: {{config('properties.priceRange.min')}},
		max: {{config('properties.priceRange.max')}},
		from: {{$price_min}},
		to: {{$price_max}},
		type: 'double',
		step: 1,
		prefix: "円 ",
		grid: true
	});
	$("#range4").ionRangeSlider({
		hide_min_max: true,
		keyboard: true,
		min: {{config('properties.acreageRange.min')}},
		max: {{config('properties.acreageRange.max')}},
		from: {{$acreage_min}},
		to: {{$acreage_max}},
		type: 'double',
		step: 1,
		prefix: "",
		grid: true
	});
</script>
@endsection