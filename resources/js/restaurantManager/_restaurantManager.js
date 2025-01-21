$(document).ready(function () {
    // Güncelle butonuna tıklandığında modal'a verileri doldur
    $('.updateRestaurantBtn').on('click', function () {
        $('#restaurantID').val($(this).data('restaurantid'));
        $('#newName').val($(this).data('restaurantname'));
        $('#description').val($(this).data('restaurantdescription'));
        $('#address').val($(this).data('restaurantaddress'));
        $('#phone').val($(this).data('restaurantphone'));
        $('#email').val($(this).data('restaurantemail'));
        $('#capacity').val($(this).data('restaurantcapacity'));
    });

    // Formu gönderme işlemi
    $('#updateRestaurantForm').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let restaurantID = $('#restaurantID').val();

        $.ajax({
            url: '/RestaurantManager/update/' + restaurantID,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire('Başarılı', 'Restoran başarıyla güncellendi.', 'success').then(() => {
                    $('#updateRestaurant').modal('hide');
                    location.reload();
                });
            },
            error: function () {
                Swal.fire('Hata', 'Güncelleme sırasında hata oluştu.', 'error');
            }
        });
    });
});