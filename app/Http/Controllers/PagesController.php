<?php

namespace App\Http\Controllers;

use Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Recommended;

use App\Custom\RecommendedHelper;
use App\Custom\VideoVoting;
use App\Custom\MailHelper;
use App\Custom\BlogPostHelper;
use App\Custom\WebNotificationsHelper;

use App\User;

use App\Notifications\GenericNotification;

class PagesController extends Controller
{

	public function test() {
		$web_push = new WebNotificationsHelper();
        $web_push->send_generic_notification_to_all("New Book Summary", "Click to learn from Killing Marketing by Robert Rose", "https://www.sunnychopper.com/books");
        return "Notifications should be sent...";
	}

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

		// Get recommended items
		$r_helper = new RecommendedHelper();
		$recommended = $r_helper->get_recommended_items_with_pagination(25);

		return view('pages.recommended')->with('page_header', $page_header)->with('recommended', $recommended);
	}

	public function contact() {
		// Page data
		$page_header = "Contact";

		return view('pages.contact')->with('page_header', $page_header);
	}

	public function submit_contact(Request $data) {
		// Get data
		$name = $data->name;
		$email = $data->email;
		$message = $data->message;

		// Create body
		$body = "<div style='width: 70%; background-color: black; display: block; margin-left: auto; margin-right: auto; padding: 16px; border-top: 2px solid #EAEAEA; border-left: 2px solid #EAEAEA; border-right: 2px solid #EAEAEA; border-top-left-radius: 5px; border-top-right-radius: 5px;'>";
		$body .= "<h3 style='color: white; text-align: center;'>Contact Form Submission</h3>";
		$body .= "</div>";
		$body .= "<div style='width: 70%; background-color: white; display: block; margin-right: auto; margin-left: auto; padding: 16px; border-left: 2px solid #EAEAEA; border-right: 2px solid #EAEAEA;'>";
		$body .= "<p><b>Name:</b> " . $name . "</p>";
		$body .= "<p><b>Email:</b> " . $email . "</p>";
		$body .= "<p><b>Message:</b> " . $message . "</p>";
		$body .= "</div>";
		$body .= "<div style='width: 70%; background-color: #EAEAEA; display: block; margin-left: auto; margin-right: auto; padding: 8px; border-left 2px solid #EAEAEA; border-right: 2px solid #EAEAEA; border-bottom: 2px solid #EAEAEA;'>";
		$body .= "<p style='text-align: center;'><small>SunnyChopper</small></p>";
		$body .= "</div>";

		// Create mail data
		$email_data = array(
			"recipient_first_name" => "Sunny",
			"recipient_last_name" => "Singh",
			"recipient_email" => "ishy.singh@gmail.com",
			"sender_first_name" => "Sunny",
			"sender_last_name" => "Singh",
			"sender_email" => "ishy.singh@gmail.com",
			"subject" => "New Contact Form Submission",
			"body" => $body
		);

		// Create email helper class
		$mail_helper = new MailHelper($email_data);
		$mail_helper->send_contact_email();

		// Send back
		return redirect()->back()->with('success', 'Successfully sent contact submission');
	}

	public function blog() {
		// Page data
		$page_header = "Free Stuff";

		// Get latest posts
		$blog_helper = new BlogPostHelper();
		$posts = $blog_helper->get_active_posts_with_pagination(10);

		return view('pages.blog')->with('page_header', $page_header)->with('posts', $posts);
	}

	public function books() {
		// Page data
		$page_header = "Book Summaries";

		return view('pages.books')->with('page_header', $page_header);
	}

	public function profile() {
		// Page data
		// TODO: Dynamically get name
		$page_header = "Sunny Singh";

		return view('pages.profile')->with('page_header', $page_header);
	}
}
