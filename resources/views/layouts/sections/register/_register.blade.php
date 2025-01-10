<div class="register-body">
    <div class="register-container">
        <div class="logo"></div>
        <h1 >Kayıt Ol</h1>
        <form action="{{route('register')}}" method="POST">
@csrf
        <div class="name-container" >        
            <input type="text" name="name" id="name" placeholder="Adınız" class="form-control reply mb-3">
        </div>
           
        <div class="surname-container">  
           <input type="text" name="surname" id="surname" placeholder="Soyadınız" class="form-control reply mb-3">
        </div>
        <input type="email" name="email" placeholder="Email" class="form-control"  required >
       
        
        <div class="password-container">
            <input type="password" name="password" placeholder="Şifre" class="form-control reply mb-3" required>
            <button type="button" class="show-password">&#128065;</button>
        </div>
        <div class="remember-me">
            <label  class="remember-checkbox">
                <input type="checkbox" name="remember" id="remember">

            </label>
            <span>Beni hatırla</span>

        </div>
        <button type="submit" class="register-button">Kayıt Ol</button>
        </form>
         <div class="social-register">
        
<button class="google-btn">Google ile Kayıt ol</button>
<button class="apple-btn">Apple ile Kayıt ol</button>
    </div>
</div>
</div>
</div>

   

     
