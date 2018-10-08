@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="grey-box">
					<h4>Vote on Next Video</h4>
					<hr />
					@if(Auth::guest())
						<p class="text-center mt-8 mb-0">You must be logged in order to vote for the next video.</p>
					@else
						@if($has_user_voted == false)
						<form id="submit_voting_form" action="/vote/create" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="voting_id" value="{{ $current_video->id }}">
							<ul class="list-group">
								<li class="list-group-item">
									<div class="row" id="choice_1">
										<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
											<input type="radio" id="radio_choice_1" name="video_vote" value="1" required>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
											<h5>{{ $current_video->option_1_title }}</h5>
											<hr />
											<p>{{ $current_video->option_1_description }}</p>
										</div>
									</div>
								</li>

								<li class="list-group-item" id="choice_2">
									<div class="row">
										<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
											<input type="radio" id="radio_choice_2" name="video_vote" value="2" required>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
											<h5>{{ $current_video->option_2_title }}</h5>
											<hr />
											<p>{{ $current_video->option_2_description }}</p>
										</div>
									</div>
								</li>

								<li class="list-group-item" id="choice_3">
									<div class="row">
										<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
											<input type="radio" id="radio_choice_3" name="video_vote" value="3" required>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
											<h5>{{ $current_video->option_3_title }}</h5>
											<hr />
											<p>{{ $current_video->option_3_description }}</p>
										</div>
									</div>
								</li>

								<li class="list-group-item" id="choice_4">
									<div class="row">
										<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
											<input type="radio" id="radio_choice_4" name="video_vote" value="4" required>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
											<h5>{{ $current_video->option_4_title }}</h5>
											<hr />
											<p>{{ $current_video->option_4_description }}</p>
										</div>
									</div>
								</li>
							</ul>

							<div class="row mt-16 mb-0">
								<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-10 offset-sm-1 col-xs-12">
									<input type="submit" class="btn btn-primary center-button" value="Submit Vote">
								</div>
							</div>
						</form>
						@else
							<p class="text-center mb-0 mt-4">You have already voted for this week.</p>
						@endif

						<div class="row mt-8 mb-0">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<p class="success-message text-center"></p>
								<p class="error-message text-center"></p>
							</div>
						</div> 
					@endif
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