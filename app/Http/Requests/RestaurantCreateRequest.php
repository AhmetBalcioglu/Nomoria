<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantCreateRequest extends FormRequest
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
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255|unique:restaurant,email',
            'capacity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'cuisineType' => 'required|string|max:255',
            'viewType' => 'required|string|max:255',
            'categoryID' => 'required|string|max:255'
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Restoran adı zorunludur.',
            'name.string' => 'Restoran adı geçerli bir metin olmalıdır.',
            'name.max' => 'Restoran adı en fazla 255 karakter olmalıdır.',
            'description.string' => 'Açıklama yalnızca metin içermelidir.',
            'address.string' => 'Adres yalnızca metin içermelidir.',
            'phone.numeric' => 'Telefon numarası yalnızca sayı içermelidir.',
            'phone.required' => 'Telefon numarası zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.max' => 'E-posta adresi en fazla 255 karakter olmalıdır.',
            'email.unique' => 'Bu e-posta adresi zaten kullanılıyor.',
            'capacity.required' => 'Kapasitelerinin belirtilmesi zorunludur.',
            'capacity.integer' => 'Kapasite geçerli bir sayı olmalıdır.',
            'image.required' => 'Resim yüklenmesi zorunludur.',
            'image.image' => 'Yüklenen dosya geçerli bir resim dosyası olmalıdır.',
            'image.mimes' => 'Resim formatı sadece jpeg, png veya jpg olmalıdır.',
            'image.max' => 'Resim boyutu en fazla 5MB olmalıdır.',
            'city.required' => 'Şehir bilgisi zorunludur.',
            'city.string' => 'Şehir bilgisi yalnızca metin içermelidir.',
            'city.max' => 'Şehir adı en fazla 255 karakter olmalıdır.',
            'district.required' => 'Semt bilgisi zorunludur.',
            'district.string' => 'Semt bilgisi yalnızca metin içermelidir.',
            'district.max' => 'Semt adı en fazla 255 karakter olmalıdır.',
            'cuisineType.string' => 'Mutfağı türü yalnızca metin içermelidir.',
            'viewType.string' => 'Manzara türü yalnızca metin içermelidir.',
            'categoryID.required' => 'Konsept zorunludur.',
            'categoryID.string' => 'Konsept yalnızca metin içermelidir.',
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
            'address' => 'Adres',
            'phone' => 'Telefon Numarası',
            'email' => 'E-posta',
            'capacity' => 'Kapasite',
            'image' => 'Resim',
            'city' => 'Şehir',
            'district' => 'Semt',
            'cuisineType' => 'Mutfak Türü',
            'viewType' => 'Manzara Türü',
            'concept' => 'Konsept',
        ];
    }
}
