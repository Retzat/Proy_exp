document.querySelector(".bars_menu").addEventListener("click", animateBars);

var line1_bars = document.querySelector(".line1_bars-menu");
var line2_bars = document.querySelector(".line2_bars-menu");
var line3_bars = document.querySelector(".line3_bars-menu");

function animateBars(){
    line1_bars.classList.toggle("activeline1_bars-menu");
    line2_bars.classList.toggle("activeline2_bars-menu");
    line3_bars.classList.toggle("activeline3_bars-menu");
}