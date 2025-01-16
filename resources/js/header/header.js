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

    // Tarayıcıdan daha önceki tema tercihini al
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
    }

    toggleButton.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");

        // Yeni durumu localStorage'a kaydet
        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("theme", "dark");
        } else {
            localStorage.setItem("theme", "light");
        }
    });
});


