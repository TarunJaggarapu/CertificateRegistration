const logout = document.getElementById('logout');
const submit = document.getElementById("submit");


import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-app.js";
import {
    getAuth,
    signOut,
    onAuthStateChanged
} from "https://www.gstatic.com/firebasejs/9.8.4/firebase-auth.js";

const firebaseConfig = {
    apiKey: "AIzaSyBXCRxje1j_KnmoyQmTBPY4G6LlcEQegLo",
    authDomain: "certi-details.firebaseapp.com",
    databaseURL:
        "https://certi-details-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "certi-details",
    storageBucket: "certi-details.appspot.com",
    messagingSenderId: "568052628441",
    appId: "1:568052628441:web:ecddece7b9023384b137c8",
    measurementId: "G-RF54MFXYHT",
};


const app = initializeApp(firebaseConfig);
const auth = getAuth();

onAuthStateChanged(auth, (user) => {
    if (user) {
        const uid = user.uid;
        console.log('logged in');
        // ...
    } else {
        window.location.replace("index.html");
    }
});

logout.addEventListener('click', (e) => {
    signOut(auth);
});

import { getStorage, ref as sRef, uploadBytesResumable } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-storage.js";
import { getFirestore, doc, getDoc, setDoc, collection, addDoc } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-firestore.js";

const cloudDb = getFirestore();


document.getElementById('upload').addEventListener('click', (e) => {
    async function uploadProcess() {

        var file = document.getElementById('image').files;
        let temp = file[0].name.split('.');
        let ext = temp.pop();
        let imagetoupload = file[0];

        const metaData = {
            contentType: imagetoupload.type,
        }
        const storage = getStorage();
        const storageRef = sRef(storage, "images/" + temp);

        const uploadtask = uploadBytesResumable(storageRef, imagetoupload, metaData);
        console.log(uploadtask);


        const url = `https://us-central1-cal-2878-f3a6ccdf7aaa.cloudfunctions.net/function-1?user=${auth.currentUser.email}`;

        //trigger cloud function
        fetch(url);
    }
    uploadProcess();
})