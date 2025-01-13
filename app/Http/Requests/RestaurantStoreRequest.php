<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'citiesID' => 'required|exists:cities,citiesID',
            'districtID' => 'required|exists:districts,districtID',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Restoran adı zorunludur.',
            'name.string' => 'Restoran adı yalnızca metin içermelidir.',
            'name.max' => 'Restoran adı en fazla 255 karakter olmalıdır.',
            'description.string' => 'Açıklama yalnızca metin içermelidir.',
            'image.string' => 'Resim yalnızca metin olmalıdır.',
            'citiesID.required' => 'Şehir seçimi zorunludur.',
            'citiesID.exists' => 'Seçilen şehir geçerli değil.',
            'districtID.required' => 'İlçe seçimi zorunludur.',
            'districtID.exists' => 'Seçilen ilçe geçerli değil.',
        ];
    }

    /**
     * Custom attribute names.
     */
    public function attributes(): array
    {
        return [
            'name' => 'Restoran Adı',
            'description' => 'Açıklama',
            'image' => 'Resim',
            'citiesID' => 'Şehir',
            'districtID' => 'İlçe',
        ];
    }
}
