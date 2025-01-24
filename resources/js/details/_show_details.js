document.addEventListener("DOMContentLoaded", function () {
    const labels = document.querySelectorAll(".rating label");

    labels.forEach(label => {
        label.addEventListener("click", function () {
            const rating = parseInt(this.getAttribute("data-rating"));
            highlightStars(rating);
        });
    });

    function highlightStars(rating) {
        labels.forEach((label, index) => {
            label.style.color = (index < rating) ? "gold" : "black";
        });
    }
});

const updateBtns = document.querySelectorAll('.comment-update-btn');
const updateForms = document.querySelectorAll('.comment-update-form');

updateBtns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        updateForms[index].classList.toggle('d-none');
    });
});

$(document).ready(function () {
    $(".openMenuModal").on("click", function () {
        let restaurantId = $(this).data("restaurant-id");

        if (!restaurantId) {
            console.error("restaurantId boş!");
            return;
        }

        $.ajax({
            url: `/restaurants/${restaurantId}/menu`,
            method: 'GET',
            success: function (data) {
                let menuList = $("#menuList");
                menuList.html("");  // Önceki içerikleri temizle

                if (data.status === "success" && data.data.length > 0) {
                    data.data.forEach(item => {
                        let li = `<li>${item.menuName} - ${item.price}₺ (${item.description})</li>`;
                        menuList.append(li);
                    });

                    // Modal'ı aç
                    $("#menuModal").modal('show');
                } else {
                    Swal.fire({
                        title: 'Menü Bulunamadı!',
                        text: 'Restoranın menüsü yüklenmemiş.',
                        icon: 'error',
                        confirmButtonText: 'Tamam'
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Menü yüklenirken hata oluştu:", error);
                Swal.fire({
                    title: 'Hata Oluştu!',
                    text: 'Restoranın menüsü bulunamadı.',
                    icon: 'error',
                    confirmButtonText: 'Tamam'
                });
            }
        });
    });
});