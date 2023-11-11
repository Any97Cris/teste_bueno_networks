importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
firebase.initializeApp({
    apiKey: "AIzaSyAwJtdhPOBoRiafSsexIDbRx5FWW5vatiU",
    projectId: "laravel-notifications-e51ce",
    messagingSenderId: "105202683647",
    appId: "1:105202683647:web:5980930a98d8565d69c6ca"
});
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});