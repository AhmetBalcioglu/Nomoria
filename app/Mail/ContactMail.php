<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $emailContent = "
            <h3>Yeni İletişim Formu Mesajı</h3>
            <p><strong>Adı Soyadı:</strong> {$this->data['name']} {$this->data['surname']}</p>
            <p><strong>E-posta:</strong> {$this->data['email']}</p>
            <p><strong>Mesaj:</strong> {$this->data['message']}</p>
            <br>
        ";

        return $this->from('destek.nomoria@gmail.com', 'Destek Nomoria')
                    ->subject('Yeni İletişim Formu Mesajı')
                    ->to('destek.nomoria@gmail.com')
                    ->html($emailContent);
    }
}
