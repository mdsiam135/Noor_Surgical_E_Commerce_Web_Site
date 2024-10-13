const header = document.querySelector('header');

function fixedNavbar(){
    header.classList.toggle('scrolled', window.pageXOffset > 0)
}
fixedNavbar();
window.addEventListener('scroll', fixedNavbar);  // This adds an event listener to the scroll event of the window. 
// Every time the user scrolls, the fixedNavbar function will be called, updating the header class as needed.

let menu =  document.querySelector('#menu-btn');

menu.addEventListener('click', function(){
   let nav = document.querySelector('.navbar');
   nav.classList.toggle('active');
})

let userBtn = document.querySelector('#user-btn');

userBtn.addEventListener('click', function(){
    let userBox = document.querySelector('.profile-detail');
    userBox.classList.toggle('active');
})