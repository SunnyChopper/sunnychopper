<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;

use App\Custom\VideoVoting;

class PagesController extends Controller
{
	public function index() {
		return view('pages.index');
	}

	public function tools() {
		// Page data
		$page_header = "Tools";

		return view('pages.tools')->with('page_header', $page_header);
	}

	public function community() {
		// Page data
		$page_header = "Community";

		// Check to see if logged in
		if(!Auth::guest()) {
			// Get current video
			$video_voting = new VideoVoting(Auth::id());
			$current_video = $video_voting->get_current_video();

			// Check to see if user has already voted
			$has_user_voted = $video_voting->hasUserVoted();

			return view('pages.community')->with('page_header', $page_header)->with('current_video', $current_video)->with('has_user_voted', $has_user_voted);
		} else {
			return view('pages.community')->with('page_header', $page_header);
		}
	}

	public function recommended() {
		// Page data
		$page_header = "Recommended Content";

		return view('pages.recommended')->with('page_header', $page_header);
	}

	public function contact() {
		// Page data
		$page_header = "Contact";

		return view('pages.contact')->with('page_header', $page_header);
	}

	public function blog() {
		// Page data
		$page_header = "Free Stuff";

		// Get latest posts
		$posts = Post::paginate(10);

		return view('pages.blog')->with('page_header', $page_header)->with('posts', $posts);
	}
}
