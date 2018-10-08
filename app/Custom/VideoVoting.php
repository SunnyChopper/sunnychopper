<?php

namespace App\Custom;

use App\NextVideo;
use App\NextVideoVote;

class VideoVoting {
	/* Global variables */
	private $user_id;

	/* Public functions */
	public function __construct($user_id) {
		$this->user_id = $user_id;
	}

	public function hasUserVoted() {
		return $this->has_user_voted();
	}

	/* Private functions */
	private function has_user_voted() {
		// Get current video voting
		$today = date("Y-m-d");
		$current_video_id = NextVideo::whereDate('start_date', '>=', $today)->whereDate('end_date' , '<=', $today)->first();

		// Check if video vote exists
		$vote_exists = NextVideoVote::where('voting_id', $current_video_id)->where('user_id', $this->user_id)->count();
		if ($vote_exists > 0) {
			return true;
		} else {
			return false;
		}
	}
}

?>