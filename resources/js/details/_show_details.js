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

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".openMenuModal").forEach(button => {
        button.addEventListener("click", function () {
            let restaurantId = this.getAttribute("data-restaurant-id");

            console.log("Restaurant ID:", restaurantId);

            if (!restaurantId) {
                console.error("restaurantId boş!");
                return;
            }

            fetch(`/restaurant/${restaurantId}/menu`)
                .then(response => response.json())
                .then(data => {
                    let menuList = document.getElementById("menuList");
                    menuList.innerHTML = "";  // Modal içeriğini temizle

                    if (data.status === "success" && data.data.length > 0) {
                        data.data.forEach(item => {
                            let li = document.createElement("li");
                            li.textContent = `${item.menuName} - ${item.price}₺ (${item.description})`;
                            menuList.appendChild(li);
                        });
                    } else {
                        menuList.innerHTML = "<li>Menü bulunamadı.</li>";
                    }

                    // Modal'i göster
                    let menuModal = new bootstrap.Modal(document.getElementById('menuModal'));
                    menuModal.show();  // Modal'ı sadece içerik yüklendikten sonra açıyoruz
                })
                .catch(error => {
                    console.error("Menü yüklenirken hata oluştu:", error);
                    document.getElementById("menuList").innerHTML = `<li>Hata oluştu: ${error.message}</li>`;
                });
        });
    });
});

