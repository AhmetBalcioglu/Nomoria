<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contact');
    }

    public function send(Request $request)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:contact_messages,email',
            'message' => 'required|string|max:255',
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        return redirect()->route('contact')->with('success', 'Mesaj Başarıyla Kaydedildi');
    }
}
