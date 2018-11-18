@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<img src="https://pbs.twimg.com/profile_images/909837993447428106/gq7I-Dsc_400x400.jpg" class="regular-image">
				<h3 class="mt-16">Sunny Singh</h3>
				<hr />
				<p>My name is Sunny Singh and I created the SunnyChopper brand. That's just how it be sometimes.</p>
				<hr />
				<p class=" mt-8 mb-0">Joined on November 18th, 2018</p>
				<p>Last active on November 18th, 2018</p>
			</div>

			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<section id="goals" class="mb-32">
					<h4 class="mb-16">My Mission</h3>
					<p>I want to help as many people get started on their entrepreneurship journey and I believe that the internet has given an extremely powerful opportunity to everyone. All you need is an internet connection, knowledge, and experience to start making the world a better place to live and also live the best life in the process.</p>
				</section>

				<section id="goals" class="mb-32">
					<h4 class="mb-16">Connect with Me</h3>
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-6 col-6">
							<button class="btn btn-info center-button">Facebook</button>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6 col-6">
							<button class="btn btn-info center-button">Twitter</button>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6 col-6">
							<button class="btn btn-info center-button">Instagram</button>
						</div>
					</div>
				</section>

				<section id="activity">
					<h4 class="mb-16">Latest Activity</h4>
					<div class="activity-box">
						<h5 class="mb-2">Voted for video</h5>
						<p class="mb-2">Sunny voted for 'How to Create a Mobile App with No Coding Knowledge' for next week's video.</p>
						<p class="mb-0"><small>November 18th, 2018 at 12:43 PM</small></p>
					</div>

					<div class="activity-box">
						<h5 class="mb-2">Viewed book summary</h5>
						<p class="mb-2">Sunny viewed the book summary for <i>The Conversion Code</i>.</p>
						<p class="mb-0"><small>November 18th, 2018 at 12:48 PM</small></p>
					</div>
				</section>
			</div>
		</div>
	</div>
@endsection