@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="grey-box">
					<form action="/contact/submit" method="post" id="contact_form">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12 form-group">
								<label>Name<span class="red">*</span>:</label>
								<input type="text" name="name" class="form-control" required>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-12 form-group">
								<label>Email<span class="red">*</span>:</label>
								<input type="email" name="email" class="form-control" required>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
								<label>Message<span class="red">*</span>:</label>
								<textarea class="form-control" name="message" rows="6" form="contact_form"></textarea>
							</div>

							@if(Session::has('success'))
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
									<p class="text-center green mb-0">{{ Session::get('success') }}</p>
								</div>
							@endif

							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-xs-12">
								<input type="submit" value="Submit" class="btn btn-primary center-button">
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<h4>Other Contact Information</h4>
				<hr />
				<ul>
					<li><p><a class="black" href="https://www.facebook.com/xSunnyChopper/"><i class="fa fa-facebook"></i> Facebook</a></p></li>
					<li><p><a class="black" href="https://www.twitter.com/SunnyChopper"><i class="fa fa-twitter"></i> Twitter</a></p></li>
					<li><p><a class="black" href="https://www.instagram.com/SunnyChopper"><i class="fa fa-instagram"></i> Instagram</a></p></li>
					<li><p><a class="black" href="https://www.snapchat.com/add/SunnyChopper"><i class="fa fa-snapchat"></i> Snapchat</a></p></li>
					<li><p><a class="black" href="https://www.youtube.com/channel/UCB05e10psLXdPzJnC-sWjEA"><i class="fa fa-youtube"></i> YouTube</a></p></li>
  				</ul>
			</div>
		</div>
	</div>
@endsection