self.addEventListener('push', function (e) {
	console.log('Got the listener');
    if (!(self.Notification && self.Notification.permission === 'granted')) {
        //notifications aren't supported or permission not granted!
        console.log('Not granted');
        return;
    }
    if (e.data) {
    	console.log(e.data.json());
        var msg = e.data.json();
        
        e.waitUntil(self.registration.showNotification(msg.title, {
            body: msg.body
        }));
    }
});