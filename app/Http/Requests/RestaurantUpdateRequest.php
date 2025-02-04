<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'newName' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|max:255',
            'capacity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'newName.required' => 'Yeni restoran adı zorunludur.',
            'newName.string' => 'Yeni restoran adı yalnızca metin olmalıdır.',
            'newName.max' => 'Yeni restoran adı en fazla 255 karakter olmalıdır.',
            'description.string' => 'Açıklama yalnızca metin içermelidir.',
            'description.required' => 'Açıklama zorunludur.',
            'address.string' => 'Adres yalnızca metin içermelidir.',
            'address.required' => 'Adres zorunludur.',
            'phone.string' => 'Telefon numarası yalnızca sayı içermelidir.',
            'phone.required' => 'Telefon numarası zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.required' => 'E-posta adresi zorunludur.',
            'email.max' => 'E-posta adresi en fazla 255 karakter olmalıdır.',
            'capacity.integer' => 'Kapasite geçerli bir sayı olmalıdır.',
            'capacity.required' => 'Kapasite zorunludur.',
            'image.required' => 'Resim yüklenmesi zorunludur.',
            'image.image' => 'Yüklenen dosya geçerli bir resim dosyası olmalıdır.',
            'image.mimes' => 'Resim formatı sadece jpeg, png, jpg, gif veya svg olmalıdır.',
            'image.max' => 'Resim boyutu en fazla 2MB olmalıdır.',
        ];
    }

    /**
     * Custom attribute names.
     */
    public function attributes(): array
    {
        return [
            'newName' => 'Yeni Restoran Adı',
            'description' => 'Açıklama',
            'address' => 'Adres',
            'phone' => 'Telefon Numarası',
            'email' => 'E-posta',
            'capacity' => 'Kapasite',
            'image' => 'Resim',
        ];
    }
}
