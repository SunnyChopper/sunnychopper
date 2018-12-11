<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\BlogPostHelper;
use App\Custom\WebNotificationsHelper;

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

    public function create(Request $data) {
    	// Get data
    	$title = $data->title;
    	$slug = $data->slug;
    	$featured_image_url = $data->featured_image_url;
    	$post = $data->post_body;

    	// Blog helper
        $blog_helper = new BlogPostHelper();
        $blog_data = array(
            "title" => $title,
            "slug" => $slug,
            "post" => $post,
            "featured_image_url" => $featured_image_url
        );
        $post_id = $blog_helper->create_post($blog_data);

        // Send out notifications
        $web_push = new WebNotificationsHelper();
        $web_push->send_generic_notification_to_all($title, strip_tags($post), "https://www.sunnychopper.com/post/" . $post_id . "/" . $slug);

    	// Redirect
    	return redirect(url('/admin/posts/view'));
    }

    public function update(Request $data) {
        // Get data
        $post_id = $data->post_id;
        $title = $data->title;
        $slug = $data->slug;
        $post = $data->post;
        $featured_image_url = $data->featured_image_url;

        // Update the blog post
        $blog_helper = new BlogPostHelper();
        $blog_data = array(
            "post_id" => $post_id,
            "title" => $title,
            "slug" => $slug,
            "post" => $post,
            "featured_image_url" => $featured_image_url
        );
        $blog_helper->update_post($blog_data);


        // Redirect
        return redirect(url('/admin/posts/view'));
    }

    public function delete(Request $data) {
        // Get data
        $post_id = $data->post_id;

        // Delete
        $blog_helper = new BlogPostHelper($post_id);
        $blog_helper->delete_post();

        // Redirect
        return redirect(url('/admin/posts/view'));
    }
}
