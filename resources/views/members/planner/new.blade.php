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

						<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-16-mobile">
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

					<h3 class="mt-32">Tasks</h3>
					<hr />

					<div class="row justify-content-center">
						<div class="col-12">
							<div class="grey-box">
								<h4 class="mb-2">Add in Tasks</h4>
								<p>Enter in the information for each task and the system will auto-generate the best planner for you. Be sure to add any static tasks down below in their respective blocks.</p>

								<div class="form-group row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-12">
										<h5 class="mb-2">Title:</h5>
										<input type="text" class="form-control" name="task">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-lg-3 col-md-3 col-sm-6 col-6">
										<div>
											<h5 class="mb-2" style="display: inline-block;">Reach:</h5>
											<div class="help-tip ml-2" style="display: inline-block;">
											    <p>How many customers will this task impact over a single quarter?</p>
											</div>
											<input type="number" class="form-control" name="reach" min="0" step="1">
										</div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-6">
										<div>
											<h5 class="mb-2" style="display: inline-block;">Impact:</h5>
											<div class="help-tip ml-2" style="display: inline-block;">
											    <p>How much will this task increase revenue or conversion rate?</p>
											</div>
											<select name="impact" class="form-control">
												<option value="0.25">Minimal</option>
												<option value="0.5">Low</option>
												<option value="1">Medium</option>
												<option value="2">High</option>
												<option value="3">Massive</option>
											</select>
										</div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-16-mobile">
										<div>
											<h5 class="mb-2" style="display: inline-block;">Confidence:</h5>
											<div class="help-tip ml-2" style="display: inline-block;">
											    <p>How confident are you about the impact of this task?</p>
											</div>
											<select name="confidence" class="form-control">
												<option value="0.1">Minimal</option>
												<option value="0.5">Low</option>
												<option value="0.8">Medium</option>
												<option value="1">High</option>
											</select>
										</div>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-16-mobile">
										<div>
											<h5 class="mb-2" style="display: inline-block;">Effort:</h5>
											<div class="help-tip ml-2" style="display: inline-block;">
											    <p>Effort is estimated as a number of "person-months" – the work that one team member can do in a month.</p>
											</div>
											<input type="number" class="form-control" name="effort" min="0" step="0.25">
										</div>
									</div>
								</div>

								<div class="form-group">
									<h5>RICE Score: <span id="rice_score"></span></h5>
								</div>

								<div class="form-group">

									<button type="button" class="add_task_button genric-btn primary small rounded" style="font-size: 14px;">Add Task</button>

									<button type="button" class="generate_planner_button genric-btn info rounded small mt-16-mobile" style="font-size: 14px;">Generate Planner</button>
									<p class="red mb-0 mt-16" style="display: none;" id="error">Please fill out all fields.</p>
									<p class="red mb-0 mt-16" style="display: none;" id="empty_tasks">There are no tasks.</p>
								</div>

								<div style="overflow: auto;">
									<table id="tasks_table" class="table table-striped">
										<thead>
											<tr>
												<th>Task</th>
												<th>Reach</th>
												<th>Impact</th>
												<th>Confidence</th>
												<th>Effort</th>
												<th>RICE Score</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group row mt-32">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="grey-box">
								<label>Block 1: <span id="block_1_time"></span></label>
								<table id="block_1" class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>RICE Score</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>

								<div class="row" style="display: flex;">
									<div class="col-lg-7 col-md-7 col-sm-12 col-12">
										<input type="text" name="add_block_1_task" class="form-control" placeholder="Non-RICE Task">
									</div>

									<div class="col-lg-5 col-md-5 col-sm-12 col-12" style="margin: auto;">
										<button data-block="1" type="button" class="centered add_static_task_button rounded genric-btn success small mt-16-mobile" style="font-size:10px;">Add Non-RICE Task</button>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="grey-box">
								<label>Block 2: <span id="block_2_time"></span></label>
								
								<table id="block_2" class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>RICE Score</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>

								<div class="row" style="display: flex;">
									<div class="col-lg-7 col-md-7 col-sm-12 col-12">
										<input type="text" name="add_block_2_task" class="form-control" placeholder="Non-RICE Task">
									</div>

									<div class="col-lg-5 col-md-5 col-sm-12 col-12" style="margin: auto;">
										<button data-block="2" type="button" class="centered add_static_task_button rounded genric-btn success small mt-16-mobile" style="font-size:10px;">Add Non-RICE Task</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="grey-box">
								<label>Block 3: <span id="block_3_time"></span></label>
								
								<table id="block_3" class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>RICE Score</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>

								<div class="row" style="display: flex;">
									<div class="col-lg-7 col-md-7 col-sm-12 col-12">
										<input type="text" name="add_block_3_task" class="form-control" placeholder="Non-RICE Task">
									</div>

									<div class="col-lg-5 col-md-5 col-sm-12 col-12" style="margin: auto;">
										<button data-block="3" type="button" class="centered add_static_task_button rounded genric-btn success small mt-16-mobile" style="font-size:10px;">Add Non-RICE Task</button>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="grey-box">
								<label>Block 4: <span id="block_4_time"></span></label>
								
								<table id="block_4" class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>RICE Score</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>

								<div class="row" style="display: flex;">
									<div class="col-lg-7 col-md-7 col-sm-12 col-12">
										<input type="text" name="add_block_4_task" class="form-control" placeholder="Non-RICE Task">
									</div>

									<div class="col-lg-5 col-md-5 col-sm-12 col-12" style="margin: auto;">
										<button data-block="4" type="button" class="centered add_static_task_button rounded genric-btn success small mt-16-mobile" style="font-size:10px;">Add Non-RICE Task</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="grey-box">
								<label>Block 5: <span id="block_5_time"></span></label>
								
								<table id="block_5" class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>RICE Score</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>

								<div class="row" style="display: flex;">
									<div class="col-lg-7 col-md-7 col-sm-12 col-12">
										<input type="text" name="add_block_5_task" class="form-control" placeholder="Non-RICE Task">
									</div>

									<div class="col-lg-5 col-md-5 col-sm-12 col-12" style="margin: auto;">
										<button data-block="5" type="button" class="centered add_static_task_button rounded genric-btn success small mt-16-mobile" style="font-size:10px;">Add Non-RICE Task</button>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="grey-box">
								<label>Block 6: <span id="block_6_time"></span></label>
								
								<table id="block_6" class="table table-striped">
									<thead>
										<tr>
											<th>Task</th>
											<th>RICE Score</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>

								<div class="row" style="display: flex;">
									<div class="col-lg-7 col-md-7 col-sm-12 col-12">
										<input type="text" name="add_block_6_task" class="form-control" placeholder="Non-RICE Task">
									</div>

									<div class="col-lg-5 col-md-5 col-sm-12 col-12" style="margin: auto;">
										<button data-block="6" type="button" class="centered add_static_task_button rounded genric-btn success small mt-16-mobile" style="font-size:10px;">Add Non-RICE Task</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group row mt-64">
						<div class="col-12">
							<input type="submit" class="genric-btn primary rounded centered" value="Create Planner">
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(document).on('click', '.delete_row_button', function(){ 
		    $(this).closest('tr').remove();
		    return false;
		});

		var tasks_array = Array();

		$(".generate_planner_button").on('click', function() {
			if (tasks_array.length == 0) {
				$("#empty_tasks").show();
			} else {
				$("#empty_tasks").hide();

				// Create temporary clone of tasks array
				var tempTasksArray = tasks_array.slice();

				// Get number block 1 tasks
				var tasks_1 = 0;
				$('#block_1 > tbody  > tr').each(function() {
					// Check to see if it has RICE score, if it does, it needs to be removed
					if ($(this).children('td')[1].innerText != "N/A") {
						$(this).remove();
					} else {
						tasks_1 += 1;
					}
				});

				// Loop through and pop off most important and keeping it under 5 tasks
				for (var i = 0; i < (5-tasks_1); i++) {
					var task = tempTasksArray.pop();
					var title = task[0];
					var rice_score = task[5];

					var markup = "<tr><td>" + title + "</td><td>" + rice_score + "</td><td><button type='button' class='genric-btn danger small rounded delete_row_button' style='float: right;'>Delete</button></td></tr>";

					$("#block_1 > tbody").append(markup);
				}

				// Get number block 2 tasks
				var tasks_2 = 0;
				$('#block_2 > tbody  > tr').each(function() {
					// Check to see if it has RICE score, if it does, it needs to be removed
					if ($(this).children('td')[1].innerText != "N/A") {
						$(this).remove();
					} else {
						tasks_2 += 1;
					}
				});

				// Loop through and pop off most important and keeping it under 5 tasks
				for (var i = 0; i < (5-tasks_2); i++) {
					var task = tempTasksArray.pop();
					var title = task[0];
					var rice_score = task[5];

					var markup = "<tr><td>" + title + "</td><td>" + rice_score + "</td><td><button type='button' class='genric-btn danger small rounded delete_row_button' style='float: right;'>Delete</button></td></tr>";

					$("#block_2 > tbody").append(markup);
				}

				// Get number block 3 tasks
				var tasks_3 = 0;
				$('#block_3 > tbody  > tr').each(function() {
					// Check to see if it has RICE score, if it does, it needs to be removed
					if ($(this).children('td')[1].innerText != "N/A") {
						$(this).remove();
					} else {
						tasks_3 += 1;
					}
				});

				// Loop through and pop off most important and keeping it under 5 tasks
				for (var i = 0; i < (5-tasks_3); i++) {
					var task = tempTasksArray.pop();
					var title = task[0];
					var rice_score = task[5];

					var markup = "<tr><td>" + title + "</td><td>" + rice_score + "</td><td><button type='button' class='genric-btn danger small rounded delete_row_button' style='float: right;'>Delete</button></td></tr>";

					$("#block_3 > tbody").append(markup);
				}

				// Get number block 4 tasks
				var tasks_4 = 0;
				$('#block_4 > tbody  > tr').each(function() {
					// Check to see if it has RICE score, if it does, it needs to be removed
					if ($(this).children('td')[1].innerText != "N/A") {
						$(this).remove();
					} else {
						tasks_4 += 1;
					}
				});

				// Loop through and pop off most important and keeping it under 5 tasks
				for (var i = 0; i < (5-tasks_4); i++) {
					var task = tempTasksArray.pop();
					var title = task[0];
					var rice_score = task[5];

					var markup = "<tr><td>" + title + "</td><td>" + rice_score + "</td><td><button type='button' class='genric-btn danger small rounded delete_row_button' style='float: right;'>Delete</button></td></tr>";

					$("#block_4 > tbody").append(markup);
				}

				// Get number block 5 tasks
				var tasks_5 = 0;
				$('#block_5 > tbody  > tr').each(function() {
					// Check to see if it has RICE score, if it does, it needs to be removed
					if ($(this).children('td')[1].innerText != "N/A") {
						$(this).remove();
					} else {
						tasks_5 += 1;
					}
				});

				// Loop through and pop off most important and keeping it under 5 tasks
				for (var i = 0; i < (5-tasks_5); i++) {
					var task = tempTasksArray.pop();
					var title = task[0];
					var rice_score = task[5];

					var markup = "<tr><td>" + title + "</td><td>" + rice_score + "</td><td><button type='button' class='genric-btn danger small rounded delete_row_button' style='float: right;'>Delete</button></td></tr>";

					$("#block_5 > tbody").append(markup);
				}

				// Get number block 6 tasks
				var tasks_6 = 0;
				$('#block_6 > tbody  > tr').each(function() {
					// Check to see if it has RICE score, if it does, it needs to be removed
					if ($(this).children('td')[1].innerText != "N/A") {
						$(this).remove();
					} else {
						tasks_6 += 1;
					}
				});

				// Loop through and pop off most important and keeping it under 5 tasks
				for (var i = 0; i < (5-tasks_6); i++) {
					var task = tempTasksArray.pop();
					var title = task[0];
					var rice_score = task[5];

					var markup = "<tr><td>" + title + "</td><td>" + rice_score + "</td><td><button type='button' class='genric-btn danger small rounded delete_row_button' style='float: right;'>Delete</button></td></tr>";

					$("#block_6 > tbody").append(markup);
				}

			}
		});



		$(".add_static_task_button").on('click', function() {
			var block_id = $(this).data('block');
			var block_selector = "#block_" + block_id;
			var text_selector = "input[name=add_block_" + block_id + "_task]";

			var markup = "<tr><td>" + $(text_selector).val() + "</td><td>N/A</td><td><button type='button' class='genric-btn danger small rounded delete_row_button' style='float: right;'>Delete</button></td></tr>";

			$(block_selector).append(markup);

			$(text_selector).val(''); 
		});

		

		$(".add_task_button").on('click', function() {
			if (allFieldsPopulated() == true && $("input[name=task]").val() != "") {
				// Hide error message
				$("#error").hide();
				$("#empty_tasks").hide();

				// Get values
				var task = $("input[name=task]").val();
				var reach = $("input[name=reach]").val();
				var impact = $("select[name=impact]").val();
				var confidence = $("select[name=confidence]").val();
				var effort = $("input[name=effort]").val();
				var rice_score = (reach * impact * confidence) / effort;

				// Create an array to push
				var push_array = [task, reach, impact, confidence, effort, rice_score];

				// This is purely for user experience
				var impact_string = "";
				if (impact == 0.25) {
					impact_string = "Minimal";
				} else if (impact == 0.5) {
					impact_string = "Low";
				} else if (impact == 1) {
					impact_string = "Medium";
				} else if (impact == 2) {
					impact_string = "High";
				} else {
					impact_string = "Massive";
				}

				// This is purely for user experience
				var confidence_string = "";
				if (confidence == 0.1) {
					confidence_string = "Minimal";
				} else if (confidence == 0.5) {
					confidence_string = "Low";
				} else if (confidence == 0.8) {
					confidence_string = "Medium";
				} else {
					confidence_string = "High";
				}

				// Create the markup and add to the table
				var markup = "<tr><td>" + task + "</td><td>" + reach + "</td><td>" + impact_string + "</td><td>" + confidence_string + "</td><td>" + effort + "</td><td>" + rice_score + "</td></tr>";
				$("#tasks_table tbody").append(markup);

				$("input[name=task]").val('');
				$("input[name=reach]").val('');
				$("select[name=impact]").val(0.25);
				$("select[name=confidence]").val(0.1);
				$("input[name=effort]").val('');
				$("#rice_score").html('');

				tasks_array.push(push_array);
				tasks_array.sort(sortFunction);
			} else {
				$("#error").show();
			}
		});

		$("input[name=reach]").on('change', function() {
			if (allFieldsPopulated() == true) {
				calculateScore();
			}
		});

		$("select[name=impact]").on('change', function() {
			if (allFieldsPopulated() == true) {
				calculateScore();
			}
		});

		$("select[name=confidence]").on('change', function() {
			if (allFieldsPopulated() == true) {
				calculateScore();
			}
		});

		$("input[name=effort]").on('change', function() {
			if (allFieldsPopulated() == true) {
				calculateScore();
			}
		});

		Date.prototype.addHours= function(h){
		    this.setHours(this.getHours()+h);
		    return this;
		}

		$("input[name=start_time]").on('change', function() {
			if (dateTimeSet() == true) {
				console.log($("input[name=start_time]").val());
				var datetime = new Date($("input[name=planner_date]").val() + " " + $("input[name=start_time]").val());
				console.log(datetime);

				var block_1_start = formatAMPM(datetime);
				datetime.setHours(datetime.getHours() + 3);
				var block_1_end = formatAMPM(datetime);
				$("#block_1_time").html(block_1_start + " - " + block_1_end);

				var block_2_start = formatAMPM(datetime);
				datetime.setHours(datetime.getHours() + 3);
				var block_2_end = formatAMPM(datetime);
				$("#block_2_time").html(block_2_start + " - " + block_2_end);

				var block_3_start = formatAMPM(datetime);
				datetime.setHours(datetime.getHours() + 3);
				var block_3_end = formatAMPM(datetime);
				$("#block_3_time").html(block_3_start + " - " + block_3_end);

				var block_4_start = formatAMPM(datetime);
				datetime.setHours(datetime.getHours() + 3);
				var block_4_end = formatAMPM(datetime);
				$("#block_4_time").html(block_4_start + " - " + block_4_end);

				var block_5_start = formatAMPM(datetime);
				datetime.setHours(datetime.getHours() + 3);
				var block_5_end = formatAMPM(datetime);
				$("#block_5_time").html(block_5_start + " - " + block_5_end);

				var block_6_start = formatAMPM(datetime);
				datetime.setHours(datetime.getHours() + 3);
				var block_6_end = formatAMPM(datetime);
				$("#block_6_time").html(block_6_start + " - " + block_6_end);
			}
		});


		function formatAMPM(date) {
			var hours = date.getHours();
			var minutes = date.getMinutes();
			var ampm = hours >= 12 ? 'pm' : 'am';
			hours = hours % 12;
			hours = hours ? hours : 12; // the hour '0' should be '12'
			minutes = minutes < 10 ? '0'+minutes : minutes;
			var strTime = hours + ':' + minutes + ' ' + ampm;
			return strTime;
		}

		function calculateScore() {
			var reach = $("input[name=reach]").val();
			var impact = $("select[name=impact]").val();
			var confidence = $("select[name=confidence]").val();
			var effort = $("input[name=effort]").val();

			var rice_score = (reach * impact * confidence) / effort;

			$("#rice_score").html(rice_score.toFixed(2));
		}

		function dateTimeSet() {
			if ($('input[name=start_time]').val() != "" && $('input[name=planner_date]').val() != "") {
				return true;
			} else {
				return false;
			}
		}

		function allFieldsPopulated() {
			if ($("input[name=reach]").val() != "" && $("input[name=effort]").val() != "") {
				return true;
			} else {
				return false;
			}
		}

		function sortFunction(a, b) {
		    if (a[5] === b[5]) {
		        return 0;
		    }
		    else {
		        return (a[5] < b[5]) ? -1 : 1;
		    }
		}
	</script>
@endsection