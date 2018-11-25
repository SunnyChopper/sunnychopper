<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\RecommendedHelper;


class RecommendedController extends Controller
{
    public  function create(Request $data) {
        // Recommended helper
        $r_helper = new RecommendedHelper();

    	// Get relevant data
    	$media_type = $data->media_type;

        // Create data for recommended helper
        $r_data = array(
            "media_type" => $media_type
        );

    	// Get other relevant data and save
    	switch($media_type) {
    		case 1:
    			// Movies
    			$movie_title = $data->movie_title;
    			$movie_image_link = $data->movie_image_link;
                $movie_amazon_link = $data->movie_amazon_link;
                $movie_description = $data->movie_description;

                // Add into array
                $r_data["movie_title"] = $movie_title;
                $r_data["movie_image_link"] = $movie_image_link;
                $r_data["movie_amazon_link"] = $movie_amazon_link;
                $r_data["movie_description"] = $movie_description;
    			break;
    		case 2:
    			// Article
    			$article_title = $data->article_title;
    			$article_link = $data->article_link;
                $article_description = $data->article_description;

    			// Add into array
                $r_data["article_title"] = $article_title;
                $r_data["article_link"] = $article_link;
                $r_data["article_description"] = $article_description;
    			break;
    		case 3:
    			// Book
    			$book_title = $data->book_title;
    			$book_image_link = $data->book_image_link;
    			$book_amazon_link = $data->book_amazon_link;
                $book_description = $data->book_description;

    			// Add into array
                $r_data["book_title"] = $book_title;
                $r_data["book_image_link"] = $book_image_link;
                $r_data["book_amazon_link"] = $book_amazon_link;
                $r_data["book_description"] = $book_description;
    			break;
    		default:
    			break;
    	}

        // Create Recommended item
        $id = $r_helper->create_recommendation($r_data);

        // Return to view all items
        return redirect(url('/admin/recommend/view'));
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

    public function delete(Request $data) {
    	// Recommended helper
        $r_helper = new RecommendedHelper();

        // Get data
        $r_id = $data->recommended_id;

        // Delete
        $r_helper->delete_item($r_id);

        // Return back to recommended view
        return redirect(url('/admin/recommend/view'));
    }
}
