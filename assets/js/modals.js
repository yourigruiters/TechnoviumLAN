// Modal functionality
const registratieKnoppen = document.querySelectorAll('.registratieKnop');
const registratieModalSpacer = document.querySelector('#registratieModal');
const registratieModal = document.querySelector('#registratieModal .modal');
const aanmeldKnoppen = document.querySelectorAll('.aanmeldKnop');
const aanmeldModalSpacer = document.querySelector('#aanmeldModal');
const aanmeldModal = document.querySelector('#aanmeldModal .modal');
const aanmeldLink = document.querySelector('#aanmeldLink');
const registreerLink = document.querySelector('#registreerlink');

const showModal = (modal) => {
    modal.style.opacity = '1';
    modal.style.minHeight = '100vh';
    modal.style.top = '0';
};

const hideModal = (modal) => {
    modal.style.opacity = '0';

    // Ensure effect is shown before changing base values.
    setTimeout(() => {
        modal.style.minHeight = '0px';
        modal.style.top = '-2000px';
    }, 500);
};

registratieKnoppen.forEach((registratieKnop) => {
    registratieKnop.addEventListener('click', (e) => {
        e.stopPropagation();
        showModal(registratieModalSpacer);
    });
});

registratieModal.addEventListener('click', (e) => {
    e.stopPropagation();
});

registratieModalSpacer.addEventListener('click', () => {
    hideModal(registratieModalSpacer);
});

aanmeldKnoppen.forEach((aanmeldKnop) => {
    aanmeldKnop.addEventListener('click', () => {
        showModal(aanmeldModalSpacer);
    });
});

aanmeldModal.addEventListener('click', (e) => {
    e.stopPropagation();
});

aanmeldModalSpacer.addEventListener('click', () => {
    hideModal(aanmeldModalSpacer);
});

// Linkjes in de modals
aanmeldLink.addEventListener('click', () => {
    hideModal(registratieModalSpacer);
    showModal(aanmeldModalSpacer);
});

// Linkjes in de modals
registreerLink.addEventListener('click', () => {
    hideModal(aanmeldModalSpacer);
    showModal(registratieModalSpacer);
});
