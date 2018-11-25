<?php

namespace App\Custom;

use App\Recommended;

class RecommendedHelper {
	/* Global variables */
	private $id;

	/* Public functions */
	public function __construct($id = 0) {
		$this->id = $id;
	}

	public function create_recommendation($data) {
		// Create empty Recommended item
		$r = new Recommended;

		// Get data
		$media_type = $data["media_type"];
		$r->media_type = $media_type;

		switch ($media_type) {
			case 1:
				// Get additional data
				$movie_title = $data["movie_title"];
				$movie_description = $data["movie_description"];
				$movie_image_link = $data["movie_image_link"];
				$movie_amazon_link = $data["movie_amazon_link"];

				// Save data
				$r->movie_title = $movie_title;
				$r->movie_description = $movie_description;
				$r->movie_image_link = $movie_image_link;
				$r->movie_amazon_link = $movie_amazon_link;

				break;
			case 2:
				// Get additional data
				$article_title = $data["article_title"];
				$article_description = $data["article_description"];
				$article_link = $data["article_link"];

				// Save data
				$r->article_title = $article_title;
				$r->article_description = $article_description;
				$r->article_link = $article_link;

				break;
			case 3:
				// Get additional data
				$book_title = $data["book_title"];
				$book_description = $data["book_description"];
				$book_image_link = $data["book_image_link"];
				$book_amazon_link = $data["book_amazon_link"];

				// Save data
				$r->book_title = $book_title;
				$r->book_description = $book_description;
				$r->book_image_link = $book_image_link;
				$r->book_amazon_link = $book_amazon_link;

				break;
			default:
				break;
		}

		$r->save();
		return $r->id;
	}

	public function get_recommended_items() {
		return Recommended::where('is_active', 1)->get();
	}

	public function get_recommended_items_with_pagination($paginate) {
		return Recommended::where('is_active', 1)->paginate($paginate);
	}

	public function delete_item($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		$r = Recommended::where('id', $id)->first();
		$r->is_active = 0;
		$r->save();
	}
}

?>