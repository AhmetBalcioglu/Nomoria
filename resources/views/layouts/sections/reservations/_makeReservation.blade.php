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
