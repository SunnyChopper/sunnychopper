self.addEventListener('push', function(event) {
	if (event.data) {
		console.log(event);
		// var data = event.data.json();
		self.registration.showNotification("Testing",{
			body: event.data.text()
		});
		console.log('This push event has data: ', event.data.text());
	} else {
		console.log('This push event has no data.');
	}
});