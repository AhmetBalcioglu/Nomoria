<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetPasswordRequest extends FormRequest
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
            'code' => 'required|integer',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Kod alanı boş bırakılamaz.',
            'password.required' => 'Şifre alanı boş bırakılamaz.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
        ];
    }


    public function attributes(): array
    {
        return [
            'code' => 'Şifre yenileme kodu',
            'password' => 'Şifre',
        ];
    }
}
