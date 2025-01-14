import './bootstrap';
import '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'
import Swal from 'sweetalert2';
window.Swal = Swal;
import './header/header.js';

// Success mesajı için kontrol
if (successMessage) {
    Swal.fire({
        icon: 'success',
        title: 'Başarılı!',
        text: successMessage,
        timer: 5000,
        timerProgressBar: true,
        showConfirmButton: false,
    });
}

// Hata mesajları için kontrol
if (errorMessages.length > 0) {
    let errorList = errorMessages.map(error => `<li>${error}</li>`).join('');
    Swal.fire({
        icon: 'error',
        title: 'Hata!',
        html: `<ul style="text-align: left; list-style: none; padding: 0;">${errorList}</ul>`,
    });
}

// Timed exit için kontrol
// 10 dakikadır işlem yapılmadığında mesaj gösterme
let idleTime = 0;

// Her 1 dakikada bir kontrol yap
setInterval(() => {
    idleTime++;
    if (idleTime >= 10) {
        Swal.fire({
            icon: 'warning',
            title: 'Oturum Süresi Doldu',
            text: '10 dakikadır işlem yapmadınız, lütfen tekrar giriş yapın.',
            showConfirmButton: true,
        }).then(() => {
            window.location.href = '/login';
        });
    }
}, 60000);

// Kullanıcı herhangi bir işlem yaptığında süreyi sıfırla
['mousemove', 'keydown', 'click'].forEach(event => {
    document.addEventListener(event, () => {
        idleTime = 0;
    });
});

