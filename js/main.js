const header = document.querySelector('header');

// Sticky navigation
$(window).ready(() => {
    if (window.pageYOffset > $(window).height() - header.offsetHeight) {
        header.classList.add('sticky');
    }
});

$(window).scroll(() => {
    if (window.pageYOffset > $(window).height() - header.offsetHeight) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
});
