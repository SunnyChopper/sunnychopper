<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\NextVideoVote;
use App\NextVideo;

class VotingController extends Controller
{
	/* Public CRUD Functions */
	public function create(Request $data) {
		if ($this->create_voting($data)) {
			return "Successful";
		} else {
			return "Failed";
		}
	}

	public function update(Request $data) {
		if ($this->update_voting($data)) {
			return "Successful";
		} else {
			return "Failed";
		}
	}

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
		$next_video_vote->save();

		// Update votes for NextVideo object
		$next_video = NextVideo::where('id', $voting_id)->first();
		switch($selected_option) {
			case 1:
				$next_video->option_1_votes = $next_video->option_1_votes + 1;
				break;
			case 2:
				$next_video->option_2_votes = $next_video->option_2_votes + 1;
				break;
			case 3:
				$next_video->option_3_votes = $next_video->option_3_votes + 1;
				break;
			case 4:
				$next_video->option_4_votes = $next_video->option_4_votes + 1;
				break;
			default:
				break;
		}

		return $next_video->save();
	}

	private function read_voting($vote_id) {
		return NextVideoVote::where('id', $vote_id)->first();
	}

	private function update_voting(Request $data) {
		// Get relevent data
		$vote_id = $data->voting_id;
		$selected_option = $data->selected_option;

		// Update the NextVideoVote object and save
		$next_video_vote = NextVideoVote::where('id', $id)->first();
		$next_video_vote->option = $selected_option;
		return $next_video_vote->save();
	}

	private function delete_voting($vote_id) {
		return NextVideoVote::where('id', $vote_id)->delete();
	}
}
