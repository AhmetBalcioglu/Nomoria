<div class="contact-container">
    <div class="concant-info">
        <h1>Bize Ulaşın</h1>
        <p>
            Email: info@example.com <br>
            Phone: +123 456 7890 <br>
            Address: 123 Main Street, Anytown, USA <br>
        </p>
        
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank" aria-label="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#df3c00" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.93 2.86 7.19 6.58 7.88v-5.56H4.69V8h1.89V6.24c0-1.87 1.1-2.89 2.78-2.89.81 0 1.66.14 1.66.14v1.83h-.94c-.93 0-1.22.58-1.22 1.17V8h2.08l-.33 2.32h-1.75v5.56C13.14 15.19 16 11.93 16 8c0-4.42-3.58-8-8-8z"/>
            </svg>
            </a>
            <a href="https://x.com" target="_blank" aria-label="x.com">
                <svg xmlns="http://www.w3.org/2000/svg"width="30" height="30" fill="#df3c00" class="bi bi-x" viewBox="0 0 100 100"  >
                    <path d="M10 10 L90 90 M90 10 L10 90" stroke=" #ed4f15"stroke-width="15" fill="none"/>
                  </svg>
                  
                  
                  
            </a>
            <a href="https://instagram.com" target="_blank" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#df3c00" class="bi bi-instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.8 0 5.555.01 4.703.048 3.852.087 3.27.24 2.77.45c-.5.21-.93.49-1.36.92-.43.43-.71.86-.92 1.36-.21.5-.36 1.08-.4 1.93C.01 5.555 0 5.8 0 8s.01 2.445.048 3.297c.04.85.19 1.43.4 1.93.21.5.49.93.92 1.36.43.43.86.71 1.36.92.5.21 1.08.36 1.93.4.85.04 1.1.048 3.297.048s2.445-.01 3.297-.048c.85-.04 1.43-.19 1.93-.4.5-.21.93-.49 1.36-.92.43-.43.71-.86.92-1.36.21-.5.36-1.08.4-1.93.04-.85.048-1.1.048-3.297s-.01-2.445-.048-3.297c-.04-.85-.19-1.43-.4-1.93-.21-.5-.49-.93-.92-1.36-.43-.43-.86-.71-1.36-.92-.5-.21-1.08-.36-1.93-.4C10.445.01 10.2 0 8 0zm0 1.44c2.17 0 2.42.01 3.27.048.78.036 1.2.17 1.48.28.37.14.63.31.91.59.28.28.45.54.59.91.11.28.24.7.28 1.48.04.85.048 1.1.048 3.27s-.01 2.42-.048 3.27c-.036.78-.17 1.2-.28 1.48-.14.37-.31.63-.59.91-.28.28-.54.45-.91.59-.28.11-.7.24-1.48.28-.85.04-1.1.048-3.27.048s-2.42-.01-3.27-.048c-.78-.036-1.2-.17-1.48-.28-.37-.14-.63-.31-.91-.59-.28-.28-.45-.54-.59-.91-.11-.28-.24-.7-.28-1.48-.04-.85-.048-1.1-.048-3.27s.01-2.42.048-3.27c.036-.78.17-1.2.28-1.48.14-.37.31-.63.59-.91.28-.28.54-.45.91-.59.28-.11.7-.24 1.48-.28.85-.04 1.1-.048 3.27-.048zM8 3.88a4.12 4.12 0 1 0 0 8.24 4.12 4.12 0 0 0 0-8.24zm0 6.8a2.68 2.68 0 1 1 0-5.36 2.68 2.68 0 0 1 0 5.36zm4.5-6.8a1.08 1.08 0 1 0 0 2.16 1.08 1.08 0 0 0 0-2.16z"/>
            </svg>
            </a>
        </div>
    </div>
    <div class="contact-form">
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