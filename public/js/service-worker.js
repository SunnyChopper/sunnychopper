self.addEventListener('push', function(event) {
	if (event.data) {
		var data = JSON.parse(event.data.text());
		self.registration.showNotification(data.title,{
			body: data.body,
			data: {
				url: data.data.url
			}
		});
		console.log('This push event has data: ', event.data.text());
	} else {
		console.log('This push event has no data.');
	}
});

self.addEventListener('notificationclick', function(event) {
	// Close notification
	event.notification.close();

	// Get URL
	let base_url = event.notification.data.url;
	let tagged_url = base_url + "?utm_source=push_notifications&utm_medium=web_push";

	// Open URL
	event.waitUntil(
		clients.matchAll({includeUncontrolled: true, type: 'window'}).then(windowClients => {
			// Check if URL already open it and just focus it
			for (var i = 0; i < windowClients.length; i++) {
				var client = windowClients[i];
				if (client.url === base_url && 'focus' in client) {
					return client.focus();
				}
			}

			if (clients.openWindow) {
				return clients.openWindow(tagged_url);
			}
		})
	);
});