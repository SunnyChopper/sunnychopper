function initPush() {
    new Promise(function (resolve, reject) {
        const permissionResult = Notification.requestPermission(function (result) {
            resolve(result);
        });
        if (permissionResult) {
            permissionResult.then(resolve, reject);
        }
    }).then((permissionResult) => {
        if (permissionResult !== 'granted') {
            throw new Error('We weren\'t granted permission.');
        }
        subscribeUser();
    });
}