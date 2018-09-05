@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="grey-box">
					<h4>Vote on Next Video</h4>
					<hr />
					<p class="text-center mt-8 mb-0">You must be logged in order to vote for the next video.</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="grey-box">
					<h4>What I'm Currently Working On</h4>
					<p class="mt-8 mb-0">Get exclusive offers to beta tools and other free stuff from right here.</p>
					<hr />
					<ul class="list-group">
						<li class="list-group-item">
							<h5>PMF Tool</h5>
							<p class="mt-2 mb-0">This tool will help you test business ideas and opt-ins quickly.</p>
						</li>
						<li class="list-group-item">
							<h5>SunnyChopper.com</h5>
							<p class="mt-2 mb-0">This website right here. Still developing it.</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection