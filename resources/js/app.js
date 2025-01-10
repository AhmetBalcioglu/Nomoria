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
