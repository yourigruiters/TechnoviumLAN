const hamburger = document.querySelector('#hamburger');
const hamburgerOverlay = document.querySelector('#hamburger-overlay');
const hamburgerOverlayLinks = document.querySelectorAll(
    '#hamburger-overlay li'
);
const hamburgerClose = document.querySelector('#hamburger-close');

// Toggle hamburger overlay menu
hamburger.addEventListener('click', () => {
    hamburgerOverlay.style.height = '100%';
});

hamburgerClose.addEventListener('click', () => {
    hamburgerOverlay.style.height = '0px';
});

hamburgerOverlayLinks.forEach((listItem) => {
    listItem.addEventListener('click', () => {
        hamburgerOverlay.style.height = '0px';
    });
});
