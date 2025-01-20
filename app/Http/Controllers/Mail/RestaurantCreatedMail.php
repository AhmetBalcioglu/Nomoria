<?php
namespace App\Http\Controllers\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestaurantCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $restaurant;

    public function __construct($restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function build()
    {
        $emailContent = "
            Merhaba, {$this->restaurant->name},<br><br>
            Restoran kaydınız başarıyla tamamlandı.<br><br>
            <strong>Restoran Bilgileri:</strong><br>
            - Adı: {$this->restaurant->name} <br>
            - E-posta: {$this->restaurant->email} <br>
            - Telefon: {$this->restaurant->phone} <br>
            - Adres: {$this->restaurant->address} <br><br>
            İyi günler dileriz.
        ";

        return $this->subject('Restoran Kaydı Başarılı')
            ->html($emailContent);
    }
}
