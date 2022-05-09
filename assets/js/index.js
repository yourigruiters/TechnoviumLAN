const header = document.querySelector('.homepage');

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

const countDownDate = new Date('Jan 5, 2024 15:00:00').getTime();

const time = setInterval(() => {
    const now = new Date().getTime();
    const timeDistance = countDownDate - now;

    const dag = Math.floor(timeDistance / (1000 * 60 * 60 * 24));
    const uur = Math.floor(
        (timeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    const minuten = Math.floor((timeDistance % (1000 * 60 * 60)) / (1000 * 60));
    const secondes = Math.floor((timeDistance % (1000 * 60)) / 1000);

    const countdownTimer = document.querySelector('#countdown');

    countdownTimer.innerHTML = `${dag}<span>D </span>${
        uur < 10 ? '0' + uur : uur
    }<span>U </span>${minuten < 10 ? '0' + minuten : minuten}<span>M </span>${
        secondes < 10 ? '0' + secondes : secondes
    }<span>S </span>`;

    if (timeDistance < 0) {
        clearInterval(x);
        countdownTimer.innerHTML = 'We are live!';
    }
}, 1000);
