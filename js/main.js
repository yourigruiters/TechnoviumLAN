// const voornaam = "Youri";
// const achternaam = "Gruiters";

// const volledigeNaam =
//   "Hallo, mijn naam is: " + voornaam + " " + achternaam + ".";
// const volledigeNaam2 = `Hallo, mijn naam is: ${voornaam} ${achternaam}.`;

// console.log(volledigeNaam);
// console.log(volledigeNaam2);

const button = document.querySelector("#klik");
const container = document.querySelector("#cont");

button.addEventListener("click", () => {
  container.style.top = "150px";
});
