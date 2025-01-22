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


    // function updateButtonText() {
    //     const isDarkMode = document.body.classList.contains("dark-mode");
    //     toggleButton.textContent = isDarkMode ? "Light Mode'a Geç" : "Dark Mode'a Geç";
    // }

    //Dark mode için svg ikonublu buton
    function updateButtonText() {
        const isDarkMode = document.body.classList.contains("dark-mode");

        // Butonun içeriğini temizle
        toggleButton.innerHTML = "";

        // SVG ikonu oluştur
        const icon = document.createElement("span");
        icon.innerHTML = isDarkMode
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16"><path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/><path d="M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zM8 14a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2a.5.5 0 0 1 .5-.5zM14 8a.5.5 0 0 1 .5.5h2a.5.5 0 0 1 0-1h-2a.5.5 0 0 1-.5.5zM0 8a.5.5 0 0 1 .5.5H2a.5.5 0 0 1 0-1H.5A.5.5 0 0 1 0 8zm11.657-5.657a.5.5 0 0 1 .707 0l1.414 1.414a.5.5 0 0 1-.707.707L11.657 3.05a.5.5 0 0 1 0-.707zm-9.9 9.9a.5.5 0 0 1 .707 0l1.414 1.414a.5.5 0 0 1-.707.707L1.757 13.95a.5.5 0 0 1 0-.707zm9.9 0a.5.5 0 0 1 .707.707l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414zM3.05 3.05a.5.5 0 0 1 .707.707L2.343 5.172a.5.5 0 1 1-.707-.707L3.05 3.05z"/></svg>'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16"><path d="M6 0a7 7 0 0 0 0 14a7.002 7.002 0 0 1 6.938-6.019a.5.5 0 0 0 .5-.5A7 7 0 0 0 6 0z"/></svg>';

        // Butona ikonu ekle
        toggleButton.appendChild(icon);
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




