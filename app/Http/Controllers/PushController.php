<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\GenericNotification;
use App\User;
use Auth;
use Notification;

class PushController extends Controller
{

	public function __construct(){
    	$this->middleware('auth');
    }

    public function store(Request $request) {
    	$this->validate($request,[
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
        ]);

        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh']; 
        $user = Auth::user();
        $user->updatePushSubscription($endpoint, $key, $token);

        // $user->notify(new \App\Notifications\GenericNotification("Welcome To WebPush", "You will now get all of our push notifications"));
        
        return response()->json(['success' => true],200);
    }
}
