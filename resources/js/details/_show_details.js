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
