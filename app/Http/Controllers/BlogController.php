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
        $og = array(
            "title" => $post->title,
            "description" => strip_tags(substr($post->post, 0, 124)),
            "image" => $post->featured_image_url,
            "url" => "https://www.sunnychopper.com/post/" . $post->id . "/" . $post->slug
        );
        $twitter = array(
            "title" => $post->title,
            "description" => strip_tags(substr($post->post, 0, 124)),
            "image" => $post->featured_image_url
        );

    	// Return view
    	return view('pages.post')->with('page_header', $page_header)->with('post', $post)->with('og', $og)->with('twitter', $twitter);
    }

    public function new() {	
    	// Page data
    	$page_header = "New Post";

    	// Return view
    	return view('pages.new-post')->with('page_header', $page_header);
    }

    public function create(Request $data) {
    	// Get data
    	$title = $data->title;
    	$slug = $data->slug;
    	$featured_image_url = $data->featured_image_url;
    	$post_body = $data->post_body;

    	// Insert
    	$post = new Post;
    	$post->title = $title;
    	$post->slug = $slug;
    	$post->post = $post_body;
    	$post->featured_image_url = $featured_image_url;
    	$post->save();

    	// Redirect
    	return redirect(url('/blog'));
    }
}
