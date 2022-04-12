const accordions = document.querySelectorAll('.accordion');

accordions.forEach((accordion) => {
    accordion.addEventListener('click', (e) => {
        e.preventDefault();

        const content = accordion.children[1];

        const contentHeight = content.offsetHeight;

        if (accordion.classList.contains('show')) {
            accordion.style.height = 60 + 'px';
        } else {
            accordion.style.height = 80 + contentHeight + 'px';
        }

        accordion.classList.toggle('show');
    });
});
