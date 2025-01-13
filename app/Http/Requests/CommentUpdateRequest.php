<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentUpdateRequest extends FormRequest
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
            'name' => 'required',
            'comment' => 'required',
            'rating' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.requried' => 'İsim zorunludur!',
            'comment.requried' => 'Yorum zorunludur!',
            'rating.requried' => 'Rating zorunludur!',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Kullanıcı İsmi',
            'user_name' => 'Kullanıcı Adı',
            'rating' => 'Rating',
            'comment' => 'Yorum',
        ];
    }
}
