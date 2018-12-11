/* ------------------- *\
	Voting AJAX
\* ------------------- */

$("#submit_voting_form").on('submit', function(e) {
	// Prevent from submitting
	e.preventDefault();

	// Get data
	var _token = $("input[name=_token]").val();
	var selected_option = $("input[name=video_vote]:checked").val();
	var voting_id = $("input[name=voting_id]").val();

	// Create AJAX request
	$.ajax({
		url: '/vote/create',
		method: 'post',
		data: {
			_token: _token,
			selected_option: selected_option,
			voting_id: voting_id
		},
		success: function(data) {
			if (data == "Successful") {
				$("#submit_voting_form").hide();
				$(".success-message").html('Succesfully submitted vote.');
			} else {
				$(".error-message").html("Error while submitting vote. Please try again later.");
			}
		}
	});
});

$("#update_voting_form").on('submit', function(e) {
	// Prevent from submitting
	e.preventDefault();

	// Get data
	var _token = $("input[name=_token]").val();
	var vote_id = $("input[name=vote_id]").val();
	var selected_option = $("input[name=selected_option]").val();

	// Create AJAX request
	$.ajax({
		url: '',
		method: 'post',
		data: {
			_token: _token,
			vote_id: vote_id,
			selected_option: selected_option
		},
		success: function(data) {
			if (data == "Successful") {
				$(".success-message").html('Succesfully submitted vote.');
			} else {
				$(".error-message").html("Error while submitting vote. Please try again later.");
			}
		}
	});
});

/* ------------------- *\
	Div Selectors
\* ------------------- */

$("#choice_1").on('click', function() {
	console.log("Choice one selected");
	$("#radio_choice_1").prop("checked", true);
});

$("#choice_2").on('click', function() {
	console.log("Choice two selected");
	$("#radio_choice_2").prop("checked", true);
});

$("#choice_3").on('click', function() {
	$("#radio_choice_3").prop("checked", true);
});

$("#choice_4").on('click', function() {
	$("#radio_choice_4").prop("checked", true);
});