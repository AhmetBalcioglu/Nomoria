$('#addRestaurantBtn').on('click', function () {
    $('#addRestaurant').modal('show');
});

// $('#submitBtn').on('click', function (event) {
//     event.preventDefault();
//     const restaurantName = $('#name').val();
//     const description = $('#description').val();
//     const address = $('#address').val();
//     const phone = $('#phone').val();
//     const email = $('#email').val();
//     const capacity = $('#capacity').val();
//     const cuisineType = $('#cuisineType').val();
//     const viewType = $('#viewType').val();
//     const concept = $('#concept').val();
//     const city = $('#city').val();
//     const district = $('#district').val();

//     console.log(restaurantName, description, address, phone, email, capacity, cuisineType, viewType, concept, city, district);

// });

// Add Restaurant AJAX
document.addEventListener('DOMContentLoaded', function () {
    const addRestaurantForm = document.getElementById('addRestaurantForm');

    addRestaurantForm.addEventListener('submit', async function (event) {
        event.preventDefault();

        const formData = new FormData(addRestaurantForm);

        const { value: isConfirmed } = await Swal.fire({ // İşlemi yaparken uyarılıyoruz
            title: 'Emin misiniz?',
            text: "Yeni bir restoran eklenecek!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Ekle!',
            cancelButtonText: 'Vazgeç'
        });

        if (isConfirmed) {
            try {
                // AJAX isteği
                const response = await $.ajax({
                    url: '/restaurants/create',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                });

                // Backend işlemi başarılı ise sweetalert ile bilgilendiriliyoruz.
                await Swal.fire({
                    title: 'Başarılı',
                    text: 'Yeni restoran başarıyla eklendi.',
                    icon: 'success'
                });

                location.reload(); // Sayfayı yenile
            } catch (error) {
                let errorMessage = 'Bir hata oluştu. Lütfen tekrar deneyin.';
                if (error.responseJSON && error.responseJSON.errors) {
                    errorMessage = Object.values(error.responseJSON.errors).join('<br>');
                }

                await Swal.fire('Hata', errorMessage, 'error');
            }
        }
    });
});