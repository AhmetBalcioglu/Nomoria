<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
            'restaurant_id' => 'required',
            'user_name' => 'required',
            'rating' => 'required',
            'comment' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'restaurant_id.requried' => 'Restoran zorunludur!',
            'user_name.requried' => 'Kullanıcı adı zorunludur!',
            'rating.requried' => 'Rating zorunludur!',
            'comment.requried' => 'Yorum zorunludur!',
        ];
    }

    public function attributes(){
        return [
            'restaurant_id'=> 'Restoran ID', 
            'user_name'=> 'Kullanıcı Adı',
            'rating'=> 'Rating',
            'comment'=> 'Yorum',
        ];
    }
}
