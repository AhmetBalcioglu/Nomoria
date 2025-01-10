// Modal'ı aç
function openImageModal(image) {
    const modal = document.getElementById("imageModal");
    const zoomImage = document.getElementById("zoomImage");

    // Resmi modal içine yükle - İmg e tıklanınca ekranda büyük resim çıkıyor.
    zoomImage.src = image.src;

    // Modal'ı görünür yap
    modal.classList.add("show");
}

$("#deneme").on("click", function () {
    openImageModal(this);

});


// Modal'ı kapat

$("#imageModal").on("click", function () {
    const modal = document.getElementById("imageModal");
    modal.classList.remove("show");
});





$("#hearth_icon").on("click", function () {
    openImageModal(this);

    // butona tıklayınca kalp kırmızı olcak bide favorilerim kısmına gidecek olan kısım 

});

// Modal'ı kapat



// Div1 img büyütme kodları

function openImageModal1(image1) {
    const modal1 = document.getElementById("imageModal1");
    const zoomImage1 = document.getElementById("zoomImage1");

    // Resmi modal içine yükle - İmg e tıklanınca ekranda büyük resim çıkıyor.
    zoomImage1.src = image1.src;

    // Modal'ı görünür yap
    modal1.classList.add("show");
}

$("#img1").on("click", function () {
    openImageModal1(this);

});


// Modal'ı kapat

$("#imageModal1").on("click", function () {
    const modal1 = document.getElementById("imageModal1");
    modal1.classList.remove("show");
});





$("#hearth_icon").on("click", function () {
    openImageModal(this);

    // butona tıklayınca kalp kırmızı olcak bide favorilerim kısmına gidecek olan kısım 

});

// Modal'ı kapat




