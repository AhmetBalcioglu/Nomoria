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
            'guestCount' => 'required',

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
