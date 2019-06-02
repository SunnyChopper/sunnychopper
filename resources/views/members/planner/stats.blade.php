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
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-10">
						<h4><b>Average RICE Score:</b></h4>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-2">
						<h4 style="float: right;">{{ sprintf("%.2f", App\Custom\PlannerHelper::getAverageRICEScore(Auth::id())) }}</h4>
					</div>
				</div>

				<div class="row mt-16">
					<div class="col-lg-8 col-md-8 col-sm-12 col-12">
						<h5>Average Completed RICE Score:</h5>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12 col-12">
						<h5 style="float: right;">{{ sprintf("%.2f", App\Custom\PlannerHelper::getCompletedRICEScore(Auth::id())) }}</h5>
					</div>
				</div>

				<div class="row mt-16">
					<div class="col-lg-8 col-md-8 col-sm-12 col-12">
						<h5>Average Uncompleted RICE Score:</h5>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12 col-12">
						<h5 style="float: right;">{{ sprintf("%.2f", App\Custom\PlannerHelper::getUncompletedRICEScore(Auth::id())) }}</h5>
					</div>
				</div>

				<div class="row mt-16">
					<div class="col-lg-8 col-md-8 col-sm-12 col-12">
						<h4><b>RICE Efficiency Score:</b></h4>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12 col-12">
						@if(App\Custom\PlannerHelper::getUncompletedRICEScore(Auth::id()) != 0)
						<h4 style="float: right;">{{ sprintf("%.2f", ((float) App\Custom\PlannerHelper::getCompletedRICEScore(Auth::id()) /(float) App\Custom\PlannerHelper::getUncompletedRICEScore(Auth::id()))) }}</h4>
						@else
						<h4 style="float: right;">N/A</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection