window.onload = function () {
    setTimeout(function () {
        document.getElementById("popup").style.display = "block";
    }, 500);
}


function closePopup() {
    document.getElementById("popup").style.display = "none";
}

$('.close-btn').on('click', function () {
    closePopup();
});