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

	public function get_current_video() {
		// Get current video voting
		$today = date("Y-m-d");	
		$current_video = NextVideo::whereDate('start_time', '<=', $today)->whereDate('end_time' , '>=', $today)->first();
		return $current_video;
	}

	/* Private functions */
	private function has_user_voted() {
		// Get current video voting
		$today = date("Y-m-d");
		$current_video = NextVideo::whereDate('start_time', '<=', $today)->whereDate('end_time' , '>=', $today)->first();

		// Check if video vote exists
		if ($current_video != NULL) {
			$vote_exists = NextVideoVote::where('voting_id', $current_video->id)->where('user_id', $this->user_id)->count();
			if ($vote_exists > 0) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 2;
		}
	}
}

?>