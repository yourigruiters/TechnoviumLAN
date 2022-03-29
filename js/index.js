let countDownDate = new Date("Jan 5, 2024 15:00:00").getTime();

let time = setInterval( () => {

    let now = new Date().getTime();
    let timeDistance = countDownDate - now;

    let days = Math.floor(timeDistance / (1000 * 60 * 60 * 24));
    let hours = Math.floor(timeDistance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
    let minutes = Math.floor(timeDistance % (1000 * 60 * 60) / (1000 * 60));
    let secondes = Math.floor(timeDistance % (1000 * 60) / (1000));

    const countdownTimer = document.querySelector("#countdown");

    countdownTimer.innerHTML = days + "D " + hours + "H " + minutes + "M " + secondes + "S ";

    if(timeDistance < 0) {
        clearInterval(x);
        countdownTimer.innerHTML = "EXPIRED";       
    }

}, 1000);


    