const header = document.querySelector('header');

function fixedNavbar(){
    header.classList.toggle('scroll', window.pageXOffset > 0)
}
fixedNavbar();
window.addEventListener('scroll', fixedNavbar);

let menu =  document.querySelector('#menu-btn');

menu.addEventListener('click', function(){
   let nav = document.querySelector('.navbar');
   nav.classList.toggle('active');
})

let userBtn = document.querySelector('#user-btn');

userBtn.addEventListener('click', function(){
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
})


