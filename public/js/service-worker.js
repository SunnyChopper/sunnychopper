self.addEventListener('push', function(event) {
	if (event.data) {
		console.log(JSON.parse(event.data.text()));
		// var data = event.data.json();
		self.registration.showNotification(data.title,{
			body: data.body
		});
		console.log('This push event has data: ', event.data.text());
	} else {
		console.log('This push event has no data.');
	}
});