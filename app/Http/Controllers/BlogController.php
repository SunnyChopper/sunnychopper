<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class BlogController extends Controller
{
    public function read($post_id, $slug) {
    	// Get post data
    	$post = Post::where('id', $post_id)->first();

    	// Page data
    	$page_header = $post->title;

    	// Return view
    	return view('pages.post')->with('page_header', $page_header)->with('post', $post);
    }
}
