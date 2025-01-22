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
            'restaurantID' => 'required',
            'userID' => 'required',
            'date' => 'required',
            'guestCount' => 'required|integer|min:1',
            'checkbox' => 'required|integer|in:1',

        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'restaurantID.required' => 'Restoran ID zorunludur.',
            'userID.required' => 'Kullanıcı ID zorunludur.',
            'date.required' => 'Rezervasyon tarihi zorunludur.',
            'guestCount.required' => 'Misafir sayısı zorunludur.',
            'checkbox.required' => 'KVKK metnini kabul etmek zorunludur.',
            'checkbox.integer' => 'KVKK metnini kabul etmek zorunludur.',
            'checkbox.in' => 'KVKK metnini kabul etmek zorunludur.',
            'guestCount.integer' => 'Lütfen geçerli bir misafir sayısı giriniz',
            'guestCount.min' => 'Lütfen geçerli bir misafir sayısı giriniz',
        ];
    }

    /**
     * Custom attribute names.
     */
    public function attributes(): array
    {
        return [
            'restaurantID' => 'Restoran ID',
            'userID' => 'Kullanıcı ID',
            'date' => 'Rezervasyon tarihi',
            'guestCount' => 'Misafir sayısı',
        ];
    }
}
