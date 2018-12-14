<?php

namespace App\Custom;

use App\BookSummary;

class BookSummaryHelper {
	/* Global variables */
	private $book_id;

	/* Public functions */
	public function __construct($book_id = 0) {
		$this->book_id = $book_id;
	}

	public function create($data) {
		// Get data
		$book_title = $data["book_title"];
		$book_image_url = $data["book_image_url"];
		$description = $data["description"];
		$author = $data["author"];
		$link = $data["link"];

		// Create new book summary and save
		$book = new BookSummary;
		$book->book_title = $book_title;
		$book->book_image_url = $book_image_url;
		$book->author = $author;
		$book->description = $description;
		$book->link = $link;
		$book->save();

		return $book->id;
	}

	public function read($book_id) {
		return BookSummary::find($book_id);
	}

	public function update($data) {
		// Get data
		$book_id = $data["book_id"];
		$book_title = $data["book_title"];
		$book_image_url = $data["book_image_url"];
		$description = $data["description"];
		$author = $data["author"];
		$link = $data["link"];

		// Get book summary and save
		$book = BookSummary::find($book_id);
		$book->book_title = $book_title;
		$book->book_image_url = $book_image_url;
		$book->author = $author;
		$book->description = $description;
		$book->link = $link;
		$book->save();

		return $book->save();
	}

	public function delete($book_id) {
		$book = BookSummary::find($book_id);
		$book->is_active = 0;
		$book->save();
	}

	public function get_all() {
		return BookSummary::where('is_active', 1)->get();
	}

	public function get_with_pagination($pagination) {
		return BookSummary::where('is_active', 1)->paginate($pagination);
	}
}

?>