window.onload = function () {
    setTimeout(function () {
        const popup = document.getElementById("popup");
        if (popup) {
            popup.style.display = "block";
        }
    }, 500);
}


function closePopup() {
    document.getElementById("popup").style.display = "none";
}

$('.close-btn').on('click', function () {
    closePopup();
});


document.addEventListener('DOMContentLoaded', function () {
    const heartIcons = document.querySelectorAll('.redirect-to-login');
    heartIcons.forEach(function (icon) {
        icon.addEventListener('click', function () {
            icon.setAttribute('fill', 'red');
            window.location.href = '/login';
        });

        icon.addEventListener('mouseover', function () {
            icon.classList.add('heart-icon-grow');
        });

        icon.addEventListener('mouseout', function () {
            icon.classList.remove('heart-icon-grow');
        });
    });
});

