const accordions = document.querySelectorAll(".accordion");
const plusminus = document.querySelectorAll(".heading-plusminus");

accordions.forEach((accordion) => {
    accordion.addEventListener("click", (e) => {
        e.preventDefault();

        console.log('test');

        const content =  accordion.children[1];

        const contentHeight = content.offsetHeight;

        if (accordion.style.height <= contentHeight) {
            accordion.style.height = 80 + contentHeight + 'px';
        } else  {
            accordion.style.height = 60 + 'px';
        }


        plusminus.forEach((plusminu) => {
            if (plusminu.innerHTML === "+") {
                plusminu.innerHTML = "+"
            } else {
                plusminu.innerHTML = "-"
            }
        })

        // pas de height aan naar 80px + viewheight px;

        // accordion.style.height = 80 + contentHeight + 'px';

    })
});