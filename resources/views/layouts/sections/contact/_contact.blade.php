
<h1 class="main-title mt-2">Nomoria nasıl kullanılır ?</h1>
<div class="contact-container mt-5 mb-5">
   
    <div class="contact-info" style="position: relative; width: 100%; height: 0; padding-bottom: 40%;">
        <iframe class="embed-responsive-item" src="{{ asset('/img/nomoria.mp4') }}" frameborder="0" allowfullscreen
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
    </div>
</div>






<div class="contact-container mt-5 mb-5">
    <div class="concant-info ">
        <h1>Memnuniyet Anketi</h1> <br>


        <div class="social-icons">
            <img src="{{ asset('img/form_image.png') }}" alt="" width="250px" ">
        </div>
    </div>
    <div class=" contact-form">
            <!--<h1 style="text-align: center;">Bize Ulaşın</h1>-->
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Adınız" required>
                <input type="text" name="surname" placeholder="Soyadınız" required>
                <input type="email" name="email" placeholder="E-mail Adresiniz" required>
                <textarea name="message" placeholder="Mesajınız" required></textarea>
                <button type="submit" class="btn btn-primary">Gönder</button>
            </form>
        </div>
    </div>