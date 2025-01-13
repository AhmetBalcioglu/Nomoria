<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Requests\ContactSendRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contact');
    }

    public function send(ContactSendRequest  $request)
    {
        $validated = $request->validated();

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        return redirect()->back()->with('success', 'Mesaj Başarıyla Kaydedildi');
    }
}
