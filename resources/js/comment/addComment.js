
stars.forEach(star => {
    star.addEventListener('mouseover', () => {
        stars.forEach(s => s.classList.remove('hover'));
        star.classList.add('hover');
        let currentStar = star;
        while (currentStar = currentStar.previousElementSibling) {
            currentStar.classList.add('hover');
        }
    });

    star.addEventListener('mouseout', () => {
        stars.forEach(s => s.classList.remove('hover'));
    });

    star.addEventListener('click', () => {
        ratingValue.value = star.getAttribute('data-value');
        stars.forEach(s => s.classList.remove('selected'));
        star.classList.add('selected');
        let currentStar = star;
        while (currentStar = currentStar.previousElementSibling) {
            currentStar.classList.add('selected');
        }
    });
});

