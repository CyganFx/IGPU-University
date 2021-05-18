//Scroll Bar

const scrollBarButton = document.getElementById("scroll-navbar-button");
const scrollBar = document.getElementById("scroll-bar");

function toggleNavBar() {
    scrollBar.classList.toggle('scroll-bar-active');
}

function toggleNavBarAndHref() {
    let top = document.getElementById("Staff").offsetTop;
    window.scrollTo(0, top);
    scrollBar.classList.toggle('scroll-bar-active');
}