<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\BookSummaryHelper;

class BookSummaryController extends Controller
{
    public function create(Request $data) {
    	// Get data
    	$book_title = $data->book_title;
    	$book_image_url = $data->book_image_url;
    	$author = $data->author;
    	$description = $data->description;
    	$link = $data->link;

    	// Summary helper and create
    	$summary_helper = new BookSummaryHelper();
    	$book_data = array(
    		"book_title" => $book_title,
    		"book_image_url" => $book_image_url,
    		"author" => $author,
    		"description" => $description,
    		"link" => $link
    	);
    	$summary_helper->create($book_data);

    	// Redirect
    	return redirect(url('/admin/summaries/view'));
    }

    public function update(Request $data) {
    	// Get data
    	$book_id = $data->book_id;
    	$book_title = $data->book_title;
    	$book_image_url = $data->book_image_url;
    	$author = $data->author;
    	$description = $data->description;
    	$link = $data->link;

    	// Summary helper and update
    	$summary_helper = new BookSummaryHelper();
    	$book_data = array(
    		"book_id" => $book_id,
    		"book_title" => $book_title,
    		"book_image_url" => $book_image_url,
    		"author" => $author,
    		"description" => $description,
    		"link" => $link
    	);
    	$summary_helper->update($book_data);

    	// Redirect
    	return redirect(url('/admin/summaries/view'));
    }

    public function delete(Request $data) {
    	// Get data
    	$book_id = $data->book_id;

    	// Summary helper and delete
    	$summary_helper = new BookSummaryHelper();
    	$summary_helper->delete($book_id);

    	// Redirect
    	return redirect(url('/admin/summaries/view'));
    }
}
