$(document).ready(function () {
    $('.reservationCancelBtn').on('click', function () {
        Swal.fire({
            title: 'Rezervasyon iptal edilsin mi?',
            text: "Rezervasyon iptal edilecek!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, iptal et',
            cancelButtonText: 'Hayır, iptal etme'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/reservation/delete/' + $(this).data('id'),
                    method: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Rezervasyon iptal edildi.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Rezervasyon iptal edilmedi.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    })

    $('.restaurantImage').on('click', function () {
        var id = $(this).data('id');
        window.location.href = '/restaurants/' + id;
    });



});
