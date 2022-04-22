const nav = document.querySelector('nav');
const introduction = document.querySelector('.introductie-spacer');

// Sticky navigation
$(window).ready(() => {
    if (window.pageYOffset > introduction.offsetHeight) {
        nav.classList.add('sticky');
    }
});

$(window).scroll(() => {
    if (window.pageYOffset > introduction.offsetHeight) {
        nav.classList.add('sticky');
    } else {
        nav.classList.remove('sticky');
    }
});
