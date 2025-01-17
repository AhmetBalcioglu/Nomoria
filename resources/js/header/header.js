//---Header---
//Sayfa aşağı doğru hareket etse bile haader kısmı en üstte sabit kalsın diye yazılan kod
document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector(".header");
    window.addEventListener("scroll", function () {
        if (window.scrollY > 0) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });
});
//------

//Dark Mode için yazılan kod
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("themeToggle");
    const lightLogo = document.getElementById("light-logo");
    const darkLogo = document.getElementById("dark-logo");


    function updateButtonText() {
        const isDarkMode = document.body.classList.contains("dark-mode");
        toggleButton.textContent = isDarkMode ? "Light Mode'a Geç" : "Dark Mode'a Geç";
    }


    function updateLogos() {
        if (document.body.classList.contains("dark-mode")) {
            lightLogo.classList.add("d-none");
            darkLogo.classList.remove("d-none");
        } else {
            lightLogo.classList.remove("d-none");
            darkLogo.classList.add("d-none");
        }
    }


    const userPreference = localStorage.getItem("theme");
    const systemPreference = window.matchMedia("(prefers-color-scheme: dark)").matches;

    if (userPreference === "dark" || (!userPreference && systemPreference)) {
        document.body.classList.add("dark-mode");
    }


    updateButtonText();
    updateLogos();


    toggleButton.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");

        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("theme", "dark");
        } else {
            localStorage.setItem("theme", "light");
        }

        updateButtonText();
        updateLogos();
    });
});




