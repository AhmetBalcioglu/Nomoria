<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contact');
    }

    // Destek maili göndermek için kullanılır.
    public function sendMail(Request $request)
    {
        // Verileri doğrulama
        $data = $request->validate([
            'name'    => 'required|string',
            'surname' => 'required|string',
            'email'   => 'required|email',
            'message' => 'required|string'
        ]);

        // Verileri veritabanına kaydetme
        $contactMessage = new ContactMessage();
        $contactMessage->name = $data['name'];
        $contactMessage->surname = $data['surname'];
        $contactMessage->email = $data['email'];
        $contactMessage->message = $data['message'];
        $contactMessage->save();

        // Mail gönderme
        Mail::to('destek.nomoria@gmail.com')->send(new ContactMail($data));

        // Başarı mesajı döndürme
        return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi!');
    }
}
