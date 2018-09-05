<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

		return view('pages.community')->with('page_header', $page_header);
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
}
