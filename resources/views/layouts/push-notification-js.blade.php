<script type="text/javascript">
	function sendNotification(){
		var data = new FormData();
		data.append('title', 'Test');
		data.append('body', 'I am currently testing this feature.');
		var xhr = new XMLHttpRequest();
		xhr.open('POST', "{{url('/api/send-notification/' . auth()->user()->id)}}", true);
		xhr.onload = function () {
			// do something to response
			console.log(this.responseText);
		};
		xhr.send(data);
	}

	var _registration = null;

	function registerServiceWorker() {
		return navigator.serviceWorker.register('{{ URL::asset('js/service-worker.js') }}').then(function(registration) {
			console.log('Service worker successfully registered.');
			_registration = registration;
			return registration;
		}).catch(function(err) {
			console.error('Unable to register service worker.', err);
		});
	}

	function askPermission() {
		return new Promise(function(resolve, reject) {
			const permissionResult = Notification.requestPermission(function(result) {
				resolve(result);
			});
			if (permissionResult) {
				permissionResult.then(resolve, reject);
			}
		}).then(function(permissionResult) {
			if (permissionResult !== 'granted') {
				throw new Error('We weren\'t granted permission.');
			} else {
				subscribeUserToPush();
			}
		});
	}

	function urlBase64ToUint8Array(base64String) {
		const padding = '='.repeat((4 - base64String.length % 4) % 4);
		const base64 = (base64String + padding).replace(/\-/g, '+').replace(/_/g, '/');
		const rawData = window.atob(base64);
		const outputArray = new Uint8Array(rawData.length);
		for (let i = 0; i < rawData.length; ++i) {
			outputArray[i] = rawData.charCodeAt(i);
		}
		return outputArray;
	}

	function getSWRegistration(){
		var promise = new Promise(function(resolve, reject) {
			// do a thing, possibly async, then…
			if (_registration != null) {
				resolve(_registration);
			} else {
				reject(Error("It broke"));
			}
		});
		return promise;
	}

	function subscribeUserToPush() {
		getSWRegistration().then(function(registration) {
			const subscribeOptions = {
				userVisibleOnly: true,
				applicationServerKey: urlBase64ToUint8Array("{{env('VAPID_PUBLIC_KEY')}}")
			};
			return registration.pushManager.subscribe(subscribeOptions);
		}).then(function(pushSubscription) {
			console.log('Received PushSubscription: ', JSON.stringify(pushSubscription));
			sendSubscriptionToBackEnd(pushSubscription);
			return pushSubscription;
		});
	}

	function sendSubscriptionToBackEnd(subscription) {
		return fetch('/push/subscribe', {
			method: 'POST',
			headers: {
				'Accept' : 'application/json',
				'Content-Type': 'application/json'
			},
			body: JSON.stringify(subscription)
		}).then((res) => {
            return res.json();
        }).then((res) => {
            console.log(res)
        }).catch((err) => {
            console.log(err)
        });
	}

	function enableNotifications(){
		//register service worker
		//check permission for notification/ask
		askPermission();
	}

	registerServiceWorker();
	enableNotifications();
</script>