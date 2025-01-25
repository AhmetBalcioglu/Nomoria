<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationCode;

    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    public function build()
    {
        $emailContent = "<p>Merhaba,</p>
        <p>E-posta adresinizi güncellemek için lütfen aşağıdaki doğrulama kodunu kontrol edin:</p>
        <p><strong>{{ $this->verificationCode }}</strong></p>";

        return $this->subject('E-posta Adresinize Dogrulama Kodu Gönderildi')
            ->html($emailContent);

    }
}
