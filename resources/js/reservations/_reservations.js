// Restoran ayrıntı sayfasına yönlendirme
$('.restaurantDiv').on('click', function () {
    var id = $(this).data('id');
    window.location.href = '/restaurants/' + id;
});