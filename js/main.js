// Modal functionality
const registratieKnop = document.querySelector('#registratieKnop');
const registratieModalSpacer = document.querySelector('#registratieModal');
const registratieModal = document.querySelector('#registratieModal .modal');
const aanmeldKnop = document.querySelector('#aanmeldKnop');
const aanmeldModalSpacer = document.querySelector('#aanmeldModal');
const aanmeldModal = document.querySelector('#aanmeldModal .modal');

registratieKnop.addEventListener('click', (e) => {
    e.stopPropagation();
    registratieModalSpacer.style.opacity = '1';
    registratieModalSpacer.style.minHeight = '100vh';
    registratieModalSpacer.style.top = '0';
});

registratieModal.addEventListener('click', (e) => {
    e.stopPropagation();
});

registratieModalSpacer.addEventListener('click', () => {
    registratieModalSpacer.style.opacity = '0';

    // Ensure effect is shown before changing base values.
    setTimeout(() => {
        registratieModalSpacer.style.minHeight = '0px';
        registratieModalSpacer.style.top = '-2000px';
    }, 500);
});

aanmeldKnop.addEventListener('click', () => {
    aanmeldModalSpacer.style.opacity = '1';
    aanmeldModalSpacer.style.minHeight = '100vh';
    aanmeldModalSpacer.style.top = '0';
});

aanmeldModal.addEventListener('click', (e) => {
    e.stopPropagation();
});

aanmeldModalSpacer.addEventListener('click', () => {
    aanmeldModalSpacer.style.opacity = '0';

    // Ensure effect is shown before changing base values.
    setTimeout(() => {
        aanmeldModalSpacer.style.minHeight = '0px';
        aanmeldModalSpacer.style.top = '-2000px';
    }, 500);
});
