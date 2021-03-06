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
use App\Custom\BookSummaryHelper;
use App\Custom\PublicToolHelper;

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

		// Get tools
		$tool_helper = new PublicToolHelper();
		$tools = $tool_helper->get_all();

		return view('pages.tools')->with('page_header', $page_header)->with('tools', $tools);
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
		return redirect()->back()->with('success', 'Successfully submitted.');
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

		// Get books
		$summary_helper = new BookSummaryHelper();
		$books = $summary_helper->get_all();

		return view('pages.books')->with('page_header', $page_header)->with('books', $books);
	}

	public function view_book_summary($book_id) {
		// Get book
		$summary_helper = new BookSummaryHelper();
		$book = $summary_helper->read($book_id);

		// Page data
		$page_header = $book->book_title;
		$og = array(
            "title" => $book->book_title,
            "description" => substr(strip_tags($book->description), 0, 124),
            "image" => $book->book_image_url,
            "url" => "https://www.sunnychopper.com/books/" . $book->id
        );
        $twitter = array(
            "title" => $book->book_title,
            "description" => substr(strip_tags($book->description), 0, 124),
            "image" => $book->book_image_url
        );

		return view('pages.view-book')->with('page_header', $page_header)->with('book', $book)->with('og', $og)->with('twitter', $twitter);
	}

	public function dev_tools() {
		$page_header = "Test Your Online Business Ideas Faster";
		$og = array(
			"title" => $page_header,
			"description" => "Get access to over 500+ ready-to-use UI components, themes, and tools for web developers to launch your next startup faster.",
			"image" => "https://i-lab.harvard.edu/innolabs/wp-content/uploads/sites/5/2017/03/intro-to-git-and-front-end-coding-1024x577.jpg",
			"url" => "https://www.sunnychopper.com/dev-tools"
		);

		return view('pages.dev-tools')->with('page_header', $page_header)->with('og', $og);
	}

	public function biz_starter_kits() {
		$page_header = "Launch Your Next Online Business Faster and with Confidence";
		$og = array(
			"title" => $page_header,
			"description" => "Get access to business ideas that come with a logo, a website, and systems already made for you. You just have to run the business",
			"image" => "https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/487612/910/607/m1/fpnw/wm0/big_set_icon_40-.jpg",
			"url" => "https://www.sunnychopper.com/biz-starter-kits"
		);

		return view('pages.biz-starter-kits')->with('page_header', $page_header)->with('og', $og);
	}

	public function profile() {
		// Page data
		// TODO: Dynamically get name
		$page_header = "Sunny Singh";

		return view('pages.profile')->with('page_header', $page_header);
	}
}
