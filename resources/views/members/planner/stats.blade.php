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

							<h3 class="text-center mb-1">{{ sprintf("%.2f", App\Custom\PlannerHelper::getWorstDay(Auth::id())[0] * 100) }}%</h3>
							<p class="text-center mb-0">Worst Day Efficiency</p>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<h3 class="text-center mb-1">{{ sprintf("%.2f", App\Custom\PlannerHelper::getBestDay(Auth::id())[0] * 100) }}%</h3>
							<p class="text-center mb-0">Best Day Efficiency</p>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<h3 class="text-center mb-1">{{ sprintf("%.2f", App\Custom\PlannerHelper::getAverage(Auth::id())) }}%</h3>
							<p class="text-center mb-0">Average Ratio</p>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<h3 class="text-center mb-1">Block {{ App\Custom\PlannerHelper::getBestBlock(Auth::id()) }}</h3>
							<p class="text-center mb-0">Best Block</p>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<?php $weekMap = [0 => 'Sunday', 1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday']; ?>
							<h3 class="text-center mb-1">{{ $weekMap[App\Custom\PlannerHelper::getBestDayAverage(Auth::id())[0]] }}</h3>
							<p class="text-center mb-0">Best Day</p>
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