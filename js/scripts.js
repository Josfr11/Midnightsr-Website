/*!
* Start Bootstrap - Creative v7.0.7 (https://startbootstrap.com/theme/creative)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-creative/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };


    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

    // Activate SimpleLightbox plugin for portfolio items
    new SimpleLightbox({
        elements: '#portfolio a.portfolio-box'
    });

    
    const firebaseConfig = {
  apiKey: "AIzaSyBVx56_9igWJZyLnAVf28uEM1yuCJY4P9U",
  authDomain: "midnightsr-db-37232.firebaseapp.com",
  databaseURL:"https://midnightsr-db-37232-default-rtdb.firebaseio.com",
  projectId: "midnightsr-db-37232",
  storageBucket: "midnightsr-db-37232.firebasestorage.app",
  messagingSenderId: "972165014924",
  appId: "1:972165014924:web:8e03bf4a457d350f0de2a9"
};
    
//Example: Adding a form submission to Firestore
       // initialize firebase //
    firebase.initializeApp(firebaseConfig);
// reference database //
    var midnightsr-db = firebase.database().ref('contactForm');

document.getElementById('contactForm').addEventListener("submit", submitForm);

    function submitForm(e) {
        e.preventDefault();

        var name = getElementVal("name");
        var email = getElementVal("email");
        var event_name = getElementVal("event_name"); 
        var gender = getElementVal("gender");
        var event_date = getElementVal("event_date");
        var message =    getElementVal("message");

        seveMessages(name, email, event_name, gender, event_date, message);
      }
    const saveMessages = (name, email, event_name, gender, event_date, message) => {
    var newContactForm = contactForm.push():

    newContactForm.set({
        name : name,
        email : email,
        event_name : event_name,
        gender : gender,
        event_date : event_date,
        message : message,
        
    
});
});
