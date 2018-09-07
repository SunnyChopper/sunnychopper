/* ------------------- *\
	Voting AJAX
\* ------------------- */

$("#submit_voting_form").on('submit', function(e) {
	// Prevent from submitting
	e.preventDefault();

	// Get data
	var _token = $("input[name=_token]").val();
	var selected_option = $("input[name=selected_option]").val();

	// Create AJAX request
	$.ajax({
		url: '',
		method: 'post',
		data: {
			_token: _token,
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