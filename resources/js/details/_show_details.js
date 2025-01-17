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

const updateBtn = document.querySelector('.comment-update-btn');
const updateForm = document.querySelector('.comment-update-form');

updateBtn.addEventListener('click', () => {
    updateForm.classList.toggle('d-none');
});