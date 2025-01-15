<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Adınızı girmeniz gerekiyor",
            'name.alpha' => "Adınızı sadece harflerden oluşacak şekilde girebilirsiniz",
            'surname.required' => "Soyadınızı girmeniz gerekiyor",
            'surname.alpha' => "Soyadınızı sadece harflerden oluşacak şekilde girebilirsiniz",
            'gender.required' => "Cinsiyetinizi girmeniz gerekiyor",
            'email.required' => "Email adresinizi girmeniz gerekiyor",
            'email.email' => "Email adresinizin geçerli bir adres olması gerekiyor",
            'email.unique' => "Girdiğiniz email adresi zaten sistemde kayıtlı",
            'password.required' => "Şifrenizi girmeniz gerekiyor",
            'password.min' => "Şifreniz en az 8 karakterden oluşacak şekilde girebilirsiniz",
            'password.confirmed' => "Girdiğiniz şifreler uyuşmuyor"
        ];
    }


    public function attributes(): array
    {
        return [
            'name' => 'Adı',
            'surname' => 'Soyadı',
            'gender' => 'Cinsiyet',
            'email' => 'Email',
            'password' => 'Şifre',
        ];
    }
}
