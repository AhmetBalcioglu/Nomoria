<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactSendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:contact_messages,email',
            'message' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ad alanı zorunludur.',
            'surname.required' => 'Soyad alanı zorunludur.',
            'email.required' => 'Email alanı zorunludur.',
            'email.unique' => 'Bu email zaten kullanılmış.',
            'message.required' => 'Mesaj alanı zorunludur.',
        ];
    }

    
    public function attributes(): array
    {
        return [
            'name' => 'isim',
            'surname' => 'soyisim',
            'email' => 'e-posta',
            'message' => 'mesaj',
        ];
    }
}
