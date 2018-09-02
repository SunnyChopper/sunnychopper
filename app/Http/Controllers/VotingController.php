<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NextVideoVote;

class VotingController extends Controller
{
	/* Private CRUD Functions */
	private function create_voting(Request $data) {
		// Get relevant data
		$voting_id = $data->voting_id;
		$selected_option = $data->selected_option;

		// Get user ID
		$user_id = Auth::id();

		// Create NextVideoVote object and save
		$next_video_vote = new NextVideoVote;
		$next_video_vote->voting_id = $voting_id;
		$next_video_vote->user_id = $user_id;
		$next_video_vote->option = $selected_option;
		return $next_video_vote->save();
	}

	private function read_voting($vote_id) {
		return NextVideoVote::where('id', $vote_id)->first();
	}

	private function update_voting(Request $data) {
		// Get relevent data
		$vote_id = $data->vote_id;
		$selected_option = $data->selected_option;

		// Update the NextVideoVote object and save
		$next_video_vote = NewVideoVote::where('id', $id)->first();
		$next_video_vote->option = $selected_option;
		return $next_video_vote->save();
	}

	private function delete_voting($vote_id) {
		return NextVideoVote::where('id', $vote_id)->delete();
	}
}
