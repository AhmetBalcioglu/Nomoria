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


 document.addEventListener('DOMContentLoaded', () => {
    const ratingStars = document.querySelectorAll('.star');
    const ratingValue = document.getElementById('ratingValue');
    const hiddenRating = document.getElementById('hiddenRating');
    const reviewForm = document.getElementById('reviewForm');
    const reviewList = document.getElementById('reviewList');
    let selectedRating = 0;

    // Yıldızlara tıklama
    ratingStars.forEach(star => {
        star.addEventListener('click', () => {
            selectedRating = star.getAttribute('data-value');
            ratingStars.forEach(s => s.classList.remove('selected'));
            for (let i = 0; i < selectedRating; i++) {
                ratingStars[i].classList.add('selected');
            }
            ratingValue.textContent = `${selectedRating}/5`;
            hiddenRating.value = selectedRating; // Gizli input'a değeri ekle
        });
    });

    // Yıldız hover efekti
    ratingStars.forEach(star => {
        star.addEventListener('mouseover', () => {
            ratingStars.forEach(s => s.classList.remove('hovered'));
            const hoverValue = star.getAttribute('data-value');
            for (let i = 0; i < hoverValue; i++) {
                ratingStars[i].classList.add('hovered');
            }
        });
        star.addEventListener('mouseout', () => {
            ratingStars.forEach(s => s.classList.remove('hovered'));
        });
    });
});


  
    // Form gönderim işlemi
    reviewForm.addEventListener('submit', (e) => {
        e.preventDefault(); // Sayfanın yeniden yüklenmesini engelle

        const reviewerName = document.getElementById('reviewerName').value;
        const reviewText = document.getElementById('reviewText').value;

        if (reviewerName && reviewText && selectedRating > 0) {
            // Yeni yorum kartını oluştur
            const reviewCard = document.createElement('div');
            reviewCard.classList.add('card', 'mb-3');
            reviewCard.innerHTML = `
                <div class="card-body">
                    <h5 class="card-title">${reviewerName}</h5>
                    <p class="card-text">${reviewText}</p>
                    <p class="card-text">
                        ${'★'.repeat(selectedRating)}${'☆'.repeat(5 - selectedRating)}
                    </p>
                
                </div>
            `;

            // Yeni yorumu listeye ekle (en üste)
            reviewList.prepend(reviewCard);

            // Formu ve yıldız seçimini sıfırla
            reviewForm.reset();
            ratingStars.forEach((star) => star.classList.remove('selected'));
            selectedRating = 0;
            ratingValue.textContent = '0/5';
        } else {
            alert('Lütfen tüm alanları doldurun ve bir puan seçin.');
        }
    });