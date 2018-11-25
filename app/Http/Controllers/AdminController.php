<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Custom\RecommendedHelper;

use App\User;

use Auth;

class AdminController extends Controller
{
    public function login() {
    	// Page data
		$page_header = "Admin Login";

		// Protect admin backend
		$this->protect();

		// Redirect if already logged in
		$redirect_code = $this->redirect_admin();
		if ($redirect_code == 0) {
			return redirect(url('/members/dashboard'));
		} elseif ($redirect_code == 1) {
			return redirect(url('/admin/dashboard'));
		}

		return view('admin.login')->with('page_header', $page_header);
    }

    public function authenticate_user(Request $data) {
    	// Get data
    	$username = $data->username;
    	$password = $data->password;

    	// Get User object
    	if (User::where('username', strtolower($username))->count() > 0) {
    		$user = User::where('username', strtolower($username))->first();
    		$hashed_pwd = Hash::make($password);
    		if ($hashed_pwd == $user->password) {
    			// Check for backend auth
    			if ($user->backend_auth == 0) {
    				return redirect()->back()->with('admin_login_error', 'You are not authorized to access this area.');
    			} else {
    				$this->login_user();
    				return redirect(url('/admin/dashboard'));
    			}
    		} else {
    			return redirect()->back()->with('admin_login_error', 'Password is incorrect.');
    		}
    	} else {
    		return redirect()->back()->with('admin_login_error', 'Username does not exist.');
    	}
    }

    public function dashboard() {
    	// Page data
		$page_header = "Admin Dashboard";

		// Protect admin backend
		$this->protect();

		return view('admin.dashboard')->with('page_header', $page_header);
    }

    public function view_recommended() {
    	// Page data
		$page_header = "Recommended Items";

		// Protect admin backend
		$this->protect();

		// Get recommended items
		$r_helper = new RecommendedHelper();
		$recommended = $r_helper->get_recommended_items_with_pagination(25);

		return view('admin.recommended.view')->with('page_header', $page_header)->with('recommended', $recommended);
    }

    public function new_recommended() {
    	// Page data
		$page_header = "New Recommended Item";

		// Protect admin backend
		$this->protect();

		return view('admin.recommended.new')->with('page_header', $page_header);
    }

    public function new_blog_post() {
        // Page data
        $page_header = "New Blog Post";

        // Protect admin backend
        $this->protect();

        return view('admin.posts.new')->with('page_header', $page_header);
    }

    /* Private functions */
    private function protect() {
    	// Check to see if already logged in
		if (Session::has('admin_login')) {
			if (Session::get('admin_login') == false) {
				return redirect(url('/admin'));
			}
		} else {
			return redirect(url('/admin'));
		}
    }

    private function redirect_admin() {
    	// Check to see if user logged in
    	if (!Auth::guest()) {
    		// Check to see if user has backend authorization
    		$user = Auth::user();
    		if ($user->backend_auth == 0) {
    			return 0;
    		} else {
    			return 1;
    		}
    	} else {
    		// Not even logged in
    		return 2;
    	}
    }

    private function login_user($data) {
    	// Get data
    	$user = Auth::user();
    	$user_id = $user->id;
    	$backend_auth = $user->backend_auth;

    	// Save
    	Session::put('backend_auth', $backend_auth);
    	Session::put('admin_user_id', $user_id);
    	Session::put('admin_login', true);
    	Session::put('admin_switch', false);
    }
}
