<?php
namespace App\Http\Controllers\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $reservation;
    public $userName;
    public function __construct($reservation, $userName)
    {
        $this->reservation = $reservation;
        $this->userName = $userName;
    }
    public function build()
    {   
        $emailContent = "
         Merhaba, {$this->userName},<br><br>
         Rezervasyon kaydınız başarıyla tamamlandı. <br><br>
         - Kişi Sayısı: {$this->reservation->guest_count}<br>
         - Rezervasyon Tarihi: {$this->reservation->reservation_time}<br>
         - Restoran Adı: {$this->reservation->restaurant->name}
        ";

        return $this->subject('Restoran Kaydı Başarılı')
            ->html($emailContent);
    }
}