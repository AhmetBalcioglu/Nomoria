<div class="container my-4">
    <h2 class="mb-5 mt-3"><b>Rezervasyonlarım</b></h2>
    <div class="row">
        @foreach ($futureReservations as $reservation)
            <!-- Restaurant Card -->
            <div class="col-md-3 mb-5 restaurantDiv">
                <div class="restaurant-card">
                    <img class="restaurantImage" data-id="{{$reservation['restaurant']['restaurantID']}}"
                        src="{{$reservation['restaurant']['image']}}" alt="Restoran">
                    <div class="restaurant-card-body">
                        <h5>{{ $reservation['restaurant']['name'] }}</h5>
                        <p>Kişi Sayısı: {{ $reservation['guest_count'] }}</p>
                        <p>Rezervasyon Tarihi: {{ $reservation['reservation_time'] }}</p>
                        <p>📍 {{ $reservation['restaurant']['cities']['name'] }}
                            {{  $reservation['restaurant']['districts']['name'] }}
                        </p>
                        <button class="btn resBtn updateRestaurantBtn"
                            data-reservationid="{{$reservation['reservationID']}}"
                            data-guestcount="{{$reservation['guest_count']}}"
                            data-reservationdate="{{$reservation['reservation_time']}}">Rezervasyonu Güncelle</button>
                        <button class="btn btn-danger reservationCancelBtn"
                            data-id="{{$reservation['reservationID']}}">İptal Et</button>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Güncelleme Modal'ı -->
    <div class="modal fade" id="updateRestaurant" tabindex="-1" aria-labelledby="updateRestaurantLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="updateRestaurantLabel">Restoran Güncelle</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateRestaurantForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="reservationID" name="reservationID">
                    <div class="modal-body">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="newGuestCount" class="form-label"><b>*</b>Yeni Kişi Sayısı</label>
                                <input type="text" class="form-control" id="newGuestCount" name="newGuestCount"
                                    placeholder="Yeni Kişi Sayısı" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="newReservationDate" class="form-label"><b>*</b>Yeni Tarih</label>
                                <input type="text" class="form-control" id="newReservationDate"
                                    name="newReservationDate" placeholder="Yeni Tarih" required>
                            </div>
                        </div>

                    </div>
                    <p class="form-text" style="margin-left: 1rem">* ile işaretli alanlar zorunludur</p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        // Güncelle butonuna tıklandığında modal'a verileri doldur
        $('.updateRestaurantBtn').on('click', function () {
            $('#reservationID').val($(this).data('reservationid'));
            $('#newGuestCount').val($(this).data('guestcount'));
            $('#newReservationDate').val($(this).data('reservationdate'));

            $('#updateRestaurant').modal('show');
        });

        // Formu gönderme işlemi
        $('#updateRestaurantForm').on('submit', function (e) {
            e.preventDefault();
            let formData = {
                reservationID: $('#reservationID').val(),
                newGuestCount: $('#newGuestCount').val(),
                newReservationDate: $('#newReservationDate').val()
            };

            $.ajax({
                url: '/reservation/update/' + formData.reservationID,
                method: 'PATCH',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    Swal.fire('Başarılı', 'Restoran başarıyla güncellendi.', 'success').then(() => {
                        $('#updateRestaurant').modal('hide');
                        location.reload();
                    });
                },
                error: function (response) {
                    Swal.fire('Hata', response.responseJSON.message, 'error');
                }
            });
        });
    });

</script>