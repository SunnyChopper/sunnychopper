self.addEventListener('push', function (e) {
	console.log('Got the listener');
    if (!(self.Notification && self.Notification.permission === 'granted')) {
        //notifications aren't supported or permission not granted!
        console.log('Not granted');
        return;
    }
    if (e.data) {
        var msg = e.data.json();
        console.log(msg);
        e.waitUntil(self.registration.showNotification(msg.title, {
            body: msg.body,
            icon: msg.icon,
            image: msg.icon
        }));
    }
});