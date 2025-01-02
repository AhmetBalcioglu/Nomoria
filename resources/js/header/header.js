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

