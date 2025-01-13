<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationCreateRequest extends FormRequest
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
            'restaurant_id' => 'required|exists:restaurants,restaurantID',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'reservation_date' => 'required|date|after:now',
            'guest_count' => 'required|integer|min:1|max:20',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'restaurant_id.required' => 'Restoran ID alanı zorunludur.',
            'restaurant_id.exists' => 'Seçilen restoran geçerli değil.',
            'customer_name.required' => 'Müşteri adı zorunludur.',
            'customer_name.string' => 'Müşteri adı yalnızca metin içermelidir.',
            'customer_name.max' => 'Müşteri adı 255 karakteri aşamaz.',
            'customer_email.required' => 'Müşteri e-posta adresi zorunludur.',
            'customer_email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'reservation_date.required' => 'Rezervasyon tarihi zorunludur.',
            'reservation_date.date' => 'Rezervasyon tarihi geçerli bir tarih olmalıdır.',
            'reservation_date.after' => 'Rezervasyon tarihi, bugünden sonraki bir tarih olmalıdır.',
            'guest_count.required' => 'Misafir sayısı zorunludur.',
            'guest_count.integer' => 'Misafir sayısı bir sayı olmalıdır.',
            'guest_count.min' => 'Misafir sayısı en az 1 olmalıdır.',
            'guest_count.max' => 'Misafir sayısı en fazla 20 olabilir.',
        ];
    }

    /**
     * Custom attribute names.
     */
    public function attributes(): array
    {
        return [
            'restaurant_id' => 'Restoran ID',
            'customer_name' => 'Müşteri Adı',
            'customer_email' => 'Müşteri E-postası',
            'reservation_date' => 'Rezervasyon Tarihi',
            'guest_count' => 'Misafir Sayısı',
        ];
    }
}
