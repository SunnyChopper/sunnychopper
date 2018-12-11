<?php

namespace App\Custom;

use App\Post;

class BlogPostHelper {
	/* Global variables */
	private $post_id;

	/* Public functions */
	public function __construct($post_id = 0) {
		$this->post_id = $post_id;
	}

	public function create_post($data) {
		// Get data
		$title = $data["title"];
		$slug = $data["slug"];
		$post_body = $data["post"];
		$featured_image_url = $data["featured_image_url"];

		// Create post
		$post = new Post;
		$post->title = $title;
		$post->slug = $slug;
		$post->post = $post_body;
		$post->featured_image_url = $featured_image_url;
		$post->save();

		return $post->id;
	}

	public function read_post($post_id = 0) {
		if ($post_id == 0) {
			$post_id = $this->post_id;
		}

		return Post::where('id', $post_id)->first();
	}

	public function update_post($data) {
		// Get data
		$post_id = $data["post_id"];
		$title = $data["title"];
		$slug = $data["slug"];
		$post_body = $data["post"];
		$featured_image_url = $data["featured_image_url"];

		// Get post and update
		$post = Post::where('id', $post_id)->first();
		$post->title = $title;
		$post->slug = $slug;
		$post->post = $post_body;
		$post->featured_image_url = $featured_image_url;
		$post->save();
	}

	public function delete_post($post_id = 0) {
		if ($post_id == 0) {
			$post_id = $this->post_id;
		}

		// Get post and delete
		$post = Post::where('id', $post_id)->first();
		$post->is_active = 0;
		$post->save();
	}

	public function get_active_posts() {
		return Post::where('is_active', 1)->orderBy('created_at', 'DESC')->get();
	}

	public function get_active_posts_with_pagination($paginate) {
		return Post::where('is_active', 1)->orderBy('created_at', 'DESC')->paginate($paginate);
	}

	public function get_deleted_posts() {
		return Post::where('is_active', 0)->orderBy('created_at', 'DESC')->get();
	}

	public function get_in_draft_posts() {
		return Post::where('is_active', 2)->orderBy('created_at', 'DESC')->get();
	}
}

?>