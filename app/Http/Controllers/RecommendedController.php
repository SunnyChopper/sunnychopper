<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recommended;

class RecommendedController extends Controller
{
    /* Private CRUD Functions */
    private function create_recommended(Request $data) {
    	// Get relevant data
    	$media_type = $data->media_type;

    	// Create Recommended object
    	$recommended = new Recommended;
    	$recommended->media_type = $media_type;

    	// Get other relevant data and save
    	switch($media_type) {
    		case 1:
    			// Movies
    			$movie_title = $data->movie_title;
    			$movie_image_link = $data->movie_image_link;

    			// Save the object
    			$recommended->movie_title = $movie_title;
    			$recommended->movie_image_link = $movie_image_link;
    			$recommended->save();
    			break;
    		case 2:
    			// Article
    			$article_title = $data->article_title;
    			$article_link = $data->article_link;

    			// Save the object
    			$recommended->article_title = $article_title;
    			$recommended->article_link = $article_link;
    			$recommended->save();
    			break;
    		case 3:
    			// Book
    			$book_title = $data->book_title;
    			$book_image_link = $data->book_image_link;
    			$book_amazon_link = $data->book_amazon_link;

    			// Save the object
    			$recommended->book_title = $book_title;
    			$recommended->book_image_link = $book_image_link;
    			$recommended->book_amazon_link = $book_amazon_link;
    			$recommended->save();
    			break;
    		default:
    			break;
    	}
    }

    private function read_recommended($recommended_id) {
    	return Recommended::where('id', $recommended_id)->first();
    }

    private function update_recommended(Request $data) {
    	// Get the object
    	$recommended = Recommended::where('id', $data->recommended_id)->first();

    	// Based on media type, get data and save
    	switch($recommended->media_type) {
    		case 1:
    			// Movies
    			$movie_title = $data->movie_title;
    			$movie_image_link = $data->movie_image_link;

    			// Save the object
    			$recommended->movie_title = $movie_title;
    			$recommended->movie_image_link = $movie_image_link;
    			$recommended->save();
    			break;
    		case 2:
    			// Article
    			$article_title = $data->article_title;
    			$article_link = $data->article_link;

    			// Save the object
    			$recommended->article_title = $article_title;
    			$recommended->article_link = $article_link;
    			$recommended->save();
    			break;
    		case 3:
    			// Book
    			$book_title = $data->book_title;
    			$book_image_link = $data->book_image_link;
    			$book_amazon_link = $data->book_amazon_link;

    			// Save the object
    			$recommended->book_title = $book_title;
    			$recommended->book_image_link = $book_image_link;
    			$recommended->book_amazon_link = $book_amazon_link;
    			$recommended->save();
    			break;
    		default:
    			break;
    	}
    }

    private function delete_recommended($recommended_id) {
    	return Recommended::where('id', $recommended_id)->first()->delete();
    }
}
