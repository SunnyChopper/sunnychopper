@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="grey-box">
					<h4 class="text-center">Quick Stats</h4>
					<hr />
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<h3 class="text-center mb-1">{{ App\Custom\PlannerHelper::getWorstDay(Auth::id()) }}</h3>
							<p class="text-center mb-0">Worst Day Ratio</p>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<h3 class="text-center mb-1">{{ App\Custom\PlannerHelper::getBestDay(Auth::id()) }}</h3>
							<p class="text-center mb-0">Best Day Ratio</p>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<h3 class="text-center mb-1">{{ App\Custom\PlannerHelper::getAverage(Auth::id()) }}</h3>
							<p class="text-center mb-0">Average Ratio</p>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<h3 class="text-center mb-1">3.13</h3>
							<p class="text-center mb-0">C-U Tasks Ratio</p>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<h3 class="text-center mb-1">75.8%</h3>
							<p class="text-center mb-0">Efficiency</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<h4 class="text-center">Advanced Stats</h4>
				<hr />
				<p class="text-center">Feature coming soon...</p>
			</div>
		</div>
	</div>
@endsection