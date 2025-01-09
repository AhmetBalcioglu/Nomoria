$('.resBtn').on('click', function () {
    var element = document.getElementById('date1');
    if (element.style.display === "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
});