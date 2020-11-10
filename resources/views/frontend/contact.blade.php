@extends('frontend.master')
@section('content')

@include('frontend.partials.banner', ['title' => App\Setting::getTitle(), 'content'=>
config('properties.text.slogan'),
'tab'=>config('properties.text.contact')])

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
	<div class="container">
		<iframe style="width:100%; height: 445px;" frameborder="0" style="border:0"
			src="https://www.google.com/maps?key=AIzaSyCaSX5Unj1CfP5GrRbTcCZyMel7VYS8aSY&q=Space+Needle,Seattle+WA&q={{App\Setting::getCoords()}}&hl=ja&z=14&amp;output=embed"
			allowfullscreen>
		</iframe>
		<div class="row mt-80">
			<div class="col-lg-3">
				<div class="contact_info">
					<div class="info_item">
						<i class="lnr lnr-home"></i>
						<h6><a href="#">{!!App\setting::getAddress()!!}</a></h6>
						<p></p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-phone-handset"></i>
						<h6><a href="tel:{{App\Setting::getPhoneNumber()}}">{{App\setting::getPhoneNumber()}}</a></h6>
						<p>{{config('properties.text.monday_to_friday')}}</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-envelope"></i>
						<h6><a href="mailto:{{App\Setting::getEmail()}}">{{App\Setting::getEmail()}}</a></h6>
						<p>{{config('properties.text.send_us_your_query_anytime')}}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<form class="row contact_form" action="{{route('contact.submit.info')}}" method="post" id="contactForm"
					novalidate="novalidate">
					@csrf
					<div class="col-md-6">
						<div class="form-group">
							<label for="">{{config('properties.text.name')}}</label>
							<input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
								placeholder="{{config('properties.text.enter_your_name')}}">
						</div>
						<div class="form-group">
							<label for="">{{config('properties.text.email')}}</label>
							<input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"
								placeholder="{{config('properties.text.enter_your_email')}}">
						</div>
						<div class="form-group">
							<label for="">@if (app('request')->has('news_id'))
								{{config('properties.text.request_asset')}}: {{$news->title}}
								@else {{config('properties.text.subject')}}
								@endif</label>
							<input class="form-control" id="orders" name="orders"
								placeholder="{{config('properties.text.enter_subject')}}"
								@if(app('request')->has('news_id'))
							value="{{app('request')->input('news_id')}}" type="hidden" @else type="text"
							value="{{old('orders')}}"
							@endif>
						</div>
						<div class="form-group">
							<label for="">{{config('properties.text.phone_number')}}</label>
							<input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}"
								placeholder="{{config('properties.text.enter_your_phone_number')}}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">{{config('properties.text.appointment')}}</label>
							<input class="form-control" type="text" id="appoinment" name="appoinment"
								value="{{old('appoinment')}}"
								placeholder="{{config('properties.text.enter_appointment_date')}}">
						</div>
						<div class="form-group">
							<label for="">{{config('properties.text.message')}}</label>
							<textarea class="form-control" name="message" id="message" rows="1"
								placeholder="{{config('properties.text.enter_message')}}">{{old('message')}}</textarea>
						</div>
					</div>
					<div class="col-md-12 text-right">
						<button type="submit" value="submit"
							class="btn primary-btn">{{config('properties.text.send_message')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- End contact-page Area -->
@endsection
@section('scripts')
<script>
	var dtt = document.getElementById('appoinment')
	  dtt.onfocus = function (event) {
	      this.type = 'datetime-local';
	      this.focus();
	  }
</script>
@endsection