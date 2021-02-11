importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

var firebaseConfig = {
	apiKey: "AIzaSyCWg5NT3OaV7ZEE5ykmvSJYwAzWAt-47JE",
	authDomain: "test-ionic-ef813.firebaseapp.com",
	databaseURL: "https://test-ionic-ef813.firebaseio.com",
	projectId: "test-ionic-ef813",
	storageBucket: "test-ionic-ef813.appspot.com",
	messagingSenderId: "581617258037",
	appId: "1:581617258037:web:43f62648ae3d5c61626b7c",
	measurementId: "G-3GCJE7V71V"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});