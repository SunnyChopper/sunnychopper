@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-12">
				<form action="/members/planner/create" id="create_planner_form" method="POST">
					{{ csrf_field() }}
					<h3>Meta Information</h3>
					@if(session()->has('error'))
					<h4 class="red mt-8">{{ session()->get('error') }}</h4>
					@endif
					<hr />
					<div class="form-group row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Start Time:</label>
							<input type="time" class="form-control" name="start_time" required>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Planner Date:</label>
							<input type="date" class="form-control" name="planner_date" required>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<label>Quote of the Day:</label>
							<textarea class="form-control" name="qotd" form="create_planner_form" rows="4" required></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Targets (one per line):</label>
							<textarea class="form-control" name="targets" form="create_planner_form" rows="8" required></textarea>
						</div>
					</div>

					<h3 class="mt-32">Tasks Information</h3>
					<hr />

					<div class="form-group row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Block 1 Tasks (one per line):</label>
							<textarea class="form-control" name="block_1_tasks" form="create_planner_form" rows="6" required></textarea>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Block 2 Tasks (one per line):</label>
							<textarea class="form-control" name="block_2_tasks" form="create_planner_form" rows="6" required></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Block 3 Tasks (one per line):</label>
							<textarea class="form-control" name="block_3_tasks" form="create_planner_form" rows="6" required></textarea>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Block 4 Tasks (one per line):</label>
							<textarea class="form-control" name="block_4_tasks" form="create_planner_form" rows="6" required></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Block 5 Tasks (one per line):</label>
							<textarea class="form-control" name="block_5_tasks" form="create_planner_form" rows="6" required></textarea>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<label>Block 6 Tasks (one per line):</label>
							<textarea class="form-control" name="block_6_tasks" form="create_planner_form" rows="6" required></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">

							<input type="submit" class="genric-btn primary rounded" value="Create Planner">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection