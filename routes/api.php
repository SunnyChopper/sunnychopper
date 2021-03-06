<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/members/planner/create', 'PlannerController@create');

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::post('/save-subscription/{id}', function($id, Request $request){
	$user = \App\User::findOrFail($id);

	$user->updatePushSubscription($request->input('endpoint'), $request->input('keys.p256dh'), $request->input('keys.auth'));
	
	return response()->json([
		'success' => true
	]);
});

Route::post('/send-notification/{id}', function($id, Request $request){
	$user = \App\User::find($id);
	
	$user->notify(new \App\Notifications\GenericNotification());

	return response()->json([
		'success' => true
	]);
});

// Leads functions
Route::get('/leads/check', 'LeadsController@email_check');
Route::post('/leads/submit', 'LeadsController@create');