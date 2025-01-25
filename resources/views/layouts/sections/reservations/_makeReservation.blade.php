<div class="container">
    <div class="row">
        <!-- Sol Kısım: Form -->
        <div class="container">
            <div class="form col-md-12">
                <div class="rezervasyonForm border p-3 rounded m-5">
                    <h2 class="formBaslik">Rezervasyon Formu</h2>
                    <form>
                        @csrf
                        <!-- Üst Kısım: IMG, Form Elemanları ve Restoran Bilgi -->
                        <div class="formUst d-flex flex-row justify-content-between align-items-start mb-3">
                            <!-- Kimlik/IMG Kutusu -->
                            <div class="img col-md-2 me-3">
                                <div class="border rounded">

                                    @foreach ($restaurants as $restaurant)
                                        @if ($restaurant['restaurantID'] == request()->input('restaurantID'))
                                            <img src="{{ asset($restaurant['image']) }}" alt="Kimlik" class="img-fluid">
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- Form Elemanları -->
                            <div class="formInputs col-md-6 me-3">
                                <!-- Ad-Soyad -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                            <path
                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" id="adSoyad" placeholder="Ad-Soyad"
                                        name="name" value="{{ session('name', '') }} {{ session('surname', '') }}"
                                        readonly>
                                </div>

                                <!-- Email -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671" />
                                            <path
                                                d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791" />
                                        </svg>
                                    </span>
                                    <input type="email" class="form-control" id="email" placeholder="E-Posta"
                                        name="email" value="{{ session('email', '') }}" readonly>
                                </div>

                                <!-- Kişi Sayısı -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                        </svg>
                                    </span>
                                    <input type="number" class="form-control" id="kisiSayisi" placeholder="Kişi Sayısı"
                                        name="guestCount">
                                </div>
                            </div>

                            <!-- Restoran Bilgi -->
                            <div class="restoranBilgi col-md-4">
                                <div class="border p-3 rounded h-100">
                                    @foreach ($restaurants as $restaurant)
                                        @if ($restaurant['restaurantID'] == request()->input('restaurantID'))
                                            <h4 class="restoranAdi mb-4">{{ $restaurant['name'] }}</h4>
                                        @endif
                                    @endforeach
                                    <p>Rezervasyon öncesi gerekli bilgileri doldurmayı unutmayınız.</p>
                                </div>
                            </div>
                        </div>


                        <!-- Alt Kısım: Diğer Form Elemanları -->

                        <div class="row">
                            <div class="col-md-8">
                                <label for="rezervasyonTarihi" class="formLabel">
                                    Rezervasyon Tarihi
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control mb-3" id="rezervasyonTarihi"
                                    name="reservationDate" required min="{{ \Carbon\Carbon::today()->toDateString() }}"
                                    max="2099-12-31">

                                <label for="rezervasyonSaati" class="formLabel">
                                    Rezervasyon Saati
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="time" class="form-control mb-3" id="rezervasyonSaati">

                            </div>

                            <div class="col-md-4">
                                <div class="not">
                                    <h6><b>Restorana Notunuz</b></h6>
                                    <textarea class="text form-control" name="textarea" id="" rows="5"
                                        placeholder="Örn: Sigara içilebilen alan"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-check mb-3">
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <label class="check" for="checkbox"> <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#kvkkModal">KVKK Aydınlatma Metnini</a> Okudum, Kabul
                                Ediyorum</label>
                        </div>

                        <!-- KVKK Modal -->
                        <div class="modal fade" id="kvkkModal" tabindex="-1" aria-labelledby="kvkkModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="kvkkModalLabel">KVKK Metni</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <b> KİŞİSEL VERİLERİN KORUNMASI KANUNU AYDINLATMA METNİ</b>
                                            <br>
                                            <b>1. Veri Sorumlusu Hakkında</b>
                                            <br>
                                            Nomoria olarak, kullanıcılarımızın kişisel verilerinin korunmasına büyük
                                            önem veriyoruz. 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”)
                                            uyarınca, kişisel verileriniz, aşağıda açıklanan çerçevede işlenecektir.
                                        </p>

                                        <p>
                                            <b>2. İşlenen Kişisel Veriler</b>
                                            <br>
                                            Web sitemizi kullanırken aşağıdaki kişisel verileriniz işlenebilir:

                                        <ul>
                                            <li>İsim ve Soyisim</li>
                                            <li>E-posta adresi</li>
                                            <li>Telefon numarası</li>
                                            <li>Konum bilgisi (isteğe bağlı olarak GPS veya IP üzerinden)</li>
                                            <li>Kullanıcı tercihleri ve arama geçmişi</li>
                                        </ul>
                                        </p>

                                        <p>
                                            <b>3. Kişisel Verilerin İşlenme Amaçları</b>
                                            <br>
                                            Kişisel verileriniz aşağıdaki amaçlarla işlenmektedir:
                                        <ul>
                                            <li>Size en uygun restoranları önermek</li>
                                            <li> Rezervasyon ve iletişim hizmetlerini sağlamak</li>
                                            <li>Kullanıcı deneyimini geliştirmek ve kişiselleştirilmiş önerilerde
                                                bulunmak</li>
                                            <li> Sorularınız ve talepleriniz için destek sağlamak</li>
                                            <li>Yasal yükümlülüklerin yerine getirilmesi</li>
                                        </ul>
                                        </p>

                                        <p>
                                            <b>4. Kişisel Verilerin Toplanma Yöntemleri</b>
                                            <br>
                                            Kişisel verileriniz; web sitesi, mobil uygulama veya e-posta gibi dijital
                                            platformlar üzerinden, otomatik veya manuel yollarla toplanmaktadır.
                                        </p>

                                        <p>
                                            <b>5. Kişisel Verilerin Aktarımı</b>
                                            <br>
                                            Kişisel verileriniz, yalnızca aşağıdaki durumlarda üçüncü taraflarla
                                            paylaşılabilir:
                                        <ul>
                                            <li>Rezervasyon işlemleri için restoranlarla paylaşım</li>
                                            <li>Yasal düzenlemeler gereği yetkili kamu kurumlarına aktarım</li>
                                            <li>Hizmet sağlayıcılar (örneğin, sunucu ve veri analiz hizmetleri)</li>
                                        </ul>
                                        </p>

                                        <p>
                                            <b>6. Kişisel Verilerin Saklanma Süresi</b>
                                            <br>
                                            Kişisel verileriniz, işleme amaçlarının gerektirdiği süre boyunca saklanır
                                            ve sonrasında silinir, yok edilir veya anonim hale getirilir.
                                        </p>

                                        <p>
                                            <b>7. Veri Sahibi Olarak Haklarınız</b>
                                            <br>
                                            KVKK’nın 11. maddesi uyarınca aşağıdaki haklara sahipsiniz:
                                        <ul>
                                            <li>Kişisel verilerinizin işlenip işlenmediğini öğrenme</li>
                                            <li>İşlenmişse buna ilişkin bilgi talep etme</li>
                                            <li>İşleme amacını ve bu amaca uygun kullanılıp kullanılmadığını öğrenme
                                            </li>
                                            <li>Yurt içinde veya yurt dışında kişisel verilerin aktarıldığı üçüncü
                                                kişileri bilme</li>
                                            <li>Kişisel verilerin eksik veya yanlış işlenmiş olması hâlinde bunların
                                                düzeltilmesini isteme</li>
                                            <li>Düzeltme, silme veya yok edilme işlemlerinin üçüncü kişilere
                                                bildirilmesini isteme</li>
                                            <li>İşlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz
                                                edilmesi suretiyle aleyhinize bir sonucun ortaya çıkmasına itiraz etme
                                            </li>
                                            <li>Kişisel verilerinizin kanuna aykırı olarak işlenmesi sebebiyle zarara
                                                uğramanız hâlinde zararın giderilmesini talep etme</li>
                                        </ul>
                                        </p>

                                        <p>
                                            <b> 8. İletişim</b>
                                            <br>

                                            KVKK kapsamındaki haklarınızı kullanmak veya sorularınızı iletmek için
                                            bizimle aşağıdaki iletişim bilgilerinden ulaşabilirsiniz:
                                        <ul>
                                            <li>Nomoria</li>
                                            <li>e-posta</li>
                                            <li>tel no</li>
                                        </ul>

                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kapat</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <button type="button" id="button" class="button">Rezervasyon Yap</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#button').click(function () {
            let urlParams = new URLSearchParams(window.location.search);
            let restaurantID = urlParams.get('restaurantID');

            let userID = {{ Session::get('userID', '-1') }};

            let date = $('#rezervasyonTarihi').val();
            let guestCount = $('#kisiSayisi').val();
            let checkbox = $('#checkbox').is(':checked') ? 1 : 0;
            $('#button').prop('disabled', true);
            $.ajax({
                method: "POST",
                url: `/makeReservation/${restaurantID}`,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    restaurantID: restaurantID,
                    userID: userID,
                    date: date,
                    guestCount: guestCount,
                    checkbox: checkbox
                },
                async: true,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Rezervasyon Yapıldı',
                            text: response.message
                        });
                        $('#button').prop('disabled', false);
                    }
                },
                error: function (response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Rezervasyon Yapılamadı',
                        text: `${response.responseJSON.message}`
                    });
                    $('#button').prop('disabled', false);
                }
            });

        });
    });
</script>