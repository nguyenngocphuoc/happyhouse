@extends('view.masterPage')
@section('content')
		<div id="colorlib-main">
			<section class="ftco-section contact-section px-md-4">
	      <div class="container">
	        <div class="row d-flex mb-5 contact-info">
	          <div class="col-md-12 mb-4">
	            <h2 class="h3">Contact Information</h2>
	          </div>
	          <div class="w-100"></div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Address:</span> {!!\App\Setting::getAddress()!!}</p>
		          </div>
	          </div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Phone:</span> <a href="tel:{{\App\Setting::getPhoneNumber()}}">{{\App\Setting::getPhoneNumber()}}</a></p>
		          </div>
	          </div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Email:</span> <a href="mailto:{{\App\Setting::getEmail()}}">{{\App\Setting::getEmail()}}</a></p>
		          </div>
	          </div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Website</span> <a href="{{url('/')}}">{{url('/')}}</a></p>
		          </div>
	          </div>
	        </div>
	        <div class="row block-9">
	          <div class="col-lg-12 d-flex">
	            <form action="{{ route('contact') }}" method="post" class="bg-light p-5 contact-form">
                    @csrf
	              <div class="form-group">
	                <input type="text" class="form-control" name="name" placeholder="Họ và tên" value="{{ old('name') }}">
	              </div>
	              <div class="form-group">
	                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                  </div>
                  <div class="form-group">
	                <input type="phone" name="phone" class="form-control" placeholder="Số điện thoại" value="{{ old('phone') }}">
	              </div>
	              <div class="form-group">
	                <input type="text" id="orders" name="orders" class="form-control" value="{{ old('orders') }}" placeholder="Subject">
	              </div>
	              <div class="form-group">
	                <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
	              </div>
	              <div class="form-group">
	                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
	              </div>
	            </form>
	          
	          </div>
	        </div>
	      </div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
@endsection
