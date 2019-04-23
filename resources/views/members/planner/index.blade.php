@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if($planner != NULL)
				<div class="col-12">
					<h3 class="mb-2">Planner Information</h3>
					<p><strong>Quote of the Day:</strong> {{ $planner->qotd }}</p>
					<hr />
					<form id="update_planner_form" class="mt-32" action="/members/planner/update" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="planner_id" value="{{ $planner->id }}">
						<div class="form-group row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Write Your Big Picture Goals (morning):</label>
								<textarea class="form-control" form="update_planner_form" name="morning_goals" rows="5">@foreach(json_decode($planner->morning_goals) as $goal){{ $goal . "\n" }}@endforeach</textarea>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Write Your Big Picture Goals (night):</label>
								<textarea class="form-control" form="update_planner_form" name="night_goals" rows="5">@foreach(json_decode($planner->night_goals) as $goal){{ $goal . "\n" }}@endforeach</textarea>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Targets:</label>
								<textarea class="form-control" form="update_planner_form" name="targets" rows="6">@foreach(json_decode($planner->targets) as $target){{ $target . "\n" }}@endforeach</textarea>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Successes:</label>
								<textarea class="form-control" form="update_planner_form" name="successes" rows="6">@foreach(json_decode($planner->successes) as $success){{ $success . "\n" }}@endforeach</textarea>
							</div>
						</div>

						<h3 class="mt-32">Tasks</h3>
						<hr />
						<div class="form-group row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<?php $timestamp = strtotime($planner->start_time); ?>
								<h5 class="mb-2">{{ date('h:i A', $timestamp) }} to {{ date('h:i A', $timestamp + 10800) }}:</h5>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>Completed</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 0; ?>
										@foreach(json_decode($planner->block_1_tasks) as $task)
										<tr>
											<td>{{ $task[0] }}</td>
											@if($task[1] == 0)
											<td>No</td>
											@else
											<td>Yes</td>
											@endif
											<td><input type="checkbox" <?php if ($task[1] == 1) { echo "checked"; } ?> name="block_1_complete[]" value="{{ $i }}"> <span class="pl-1">Mark as complete</span></td>
											<?php $i += 1; ?>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h5 class="mb-2">{{ date('h:i A', $timestamp + 10800) }} to {{ date('h:i A', $timestamp + 21600) }}:</h5>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>Completed</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 0; ?>
										@foreach(json_decode($planner->block_2_tasks) as $task)
										<tr>
											<td>{{ $task[0] }}</td>
											@if($task[1] == 0)
											<td>No</td>
											@else
											<td>Yes</td>
											@endif
											<td><input type="checkbox" <?php if ($task[1] == 1) { echo "checked"; } ?> name="block_2_complete[]" value="{{ $i }}"> <span class="pl-1">Mark as complete</span></td>
											<?php $i += 1; ?>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h5 class="mb-2">{{ date('h:i A', $timestamp + 21600) }} to {{ date('h:i A', $timestamp + 32400) }}:</h5>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>Completed</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 0; ?>
										@foreach(json_decode($planner->block_3_tasks) as $task)
										<tr>
											<td>{{ $task[0] }}</td>
											@if($task[1] == 0)
											<td>No</td>
											@else
											<td>Yes</td>
											@endif
											<td><input type="checkbox" <?php if ($task[1] == 1) { echo "checked"; } ?> name="block_3_complete[]" value="{{ $i }}"> <span class="pl-1">Mark as complete</span></td>
											<?php $i += 1; ?>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h5 class="mb-2">{{ date('h:i A', $timestamp + 32400) }} to {{ date('h:i A', $timestamp + 43200) }}:</h5>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>Completed</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 0; ?>
										@foreach(json_decode($planner->block_4_tasks) as $task)
										<tr>
											<td>{{ $task[0] }}</td>
											@if($task[1] == 0)
											<td>No</td>
											@else
											<td>Yes</td>
											@endif
											<td><input type="checkbox" <?php if ($task[1] == 1) { echo "checked"; } ?> name="block_4_complete[]" value="{{ $i }}"> <span class="pl-1">Mark as complete</span></td>
											<?php $i += 1; ?>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h5 class="mb-2">{{ date('h:i A', $timestamp + 43200) }} to {{ date('h:i A', $timestamp + 54000) }}:</h5>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>Completed</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 0; ?>
										@foreach(json_decode($planner->block_5_tasks) as $task)
										<tr>
											<td>{{ $task[0] }}</td>
											@if($task[1] == 0)
											<td>No</td>
											@else
											<td>Yes</td>
											@endif
											<td><input type="checkbox" <?php if ($task[1] == 1) { echo "checked"; } ?> name="block_5_complete[]" value="{{ $i }}"> <span class="pl-1">Mark as complete</span></td>
											<?php $i += 1; ?>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h5 class="mb-2">{{ date('h:i A', $timestamp + 54000) }} to Later:</h5>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>Completed</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 0; ?>
										@foreach(json_decode($planner->block_6_tasks) as $task)
										<tr>
											<td>{{ $task[0] }}</td>
											@if($task[1] == 0)
											<td>No</td>
											@else
											<td>Yes</td>
											@endif
											<td><input type="checkbox" <?php if ($task[1] == 1) { echo "checked"; } ?> name="block_6_complete[]" value="{{ $i }}"> <span class="pl-1">Mark as complete</span></td>
											<?php $i += 1; ?>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<div class="centered">
										<input type="submit" class="genric-btn primary" value="Update Planner">
										<a href="/members/planner/new" class="genric-btn info">Create New Planner</a>
										{{-- <a href="/members/planner/stats" class="genric-btn danger">View Stats</a> --}}
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			@else
				<div class="col-lg-7 col-md-8 col-sm-12 col-12">
					<div class="grey-box">
						<h4 class="text-center mb-2">No Planner for Today</h4>
						<p class="text-center">There was no planner found for today. Click below to create a planner.</p>
						<a href="/members/planner/new" class="genric-btn primary rounded centered">Create Planner</a>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection