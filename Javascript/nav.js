const hamburgerBtn = document.querySelector(".nav__toggler");
const navigation = document.querySelector(".header__nav");

hamburgerBtn.addEventListener("click", toggleNav);

function toggleNav(){
    hamburgerBtn.classList.toggle("active");
    navigation.classList.toggle("active");
}