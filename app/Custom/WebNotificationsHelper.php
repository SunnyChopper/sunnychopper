<?php

namespace App\Custom;

use App\User;

use Auth;
use Notification;

use App\Notifications\GenericNotification;

class WebNotificationsHelper {
	/* Global variables */
	private $user_id;

	/* Public functions */
	public function __construct($user_id) {
		$this->user_id = $user_id;
	}

	public function store_notification_data($data) {
		// Get keys
		$endpoint = $data["endpoint"];
        $token = $data['auth'];
        $key = $data['p256dh'];

        // Store user
        $user = Auth::user();
        $user->updatePushSubscription($endpoint, $key, $token);
	}

	public function send_generic_notification($user_id, $title, $body, $action_url) {
		// Get user
		$user = User::find($user_id);

		// Notify
		$user->notify(new GenericNotification($title, $body, $action_url));
	}
}

?>