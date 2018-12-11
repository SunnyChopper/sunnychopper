<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\WebNotificationsHelper;

class PushController extends Controller
{
    public function store(Request $data) {
    	// Get data
    	$endpoint = $data->input('endpoint');
    	$key = $data->input('keys.p256dh');
    	$token = $data->input('keys.auth');

    	// Create array for web push helper
    	$web_push_data = array(
    		"endpoint" => $endpoint,
    		"p256dh" => $key,
    		"auth" => $token
    	);

    	// Store
    	$web_push_helper = new WebNotificationsHelper();
    	$web_push_helper->store_notification_data($web_push_data);

    	// Return
    	return response()->json([
			'success' => true
		]);
    } 
}
