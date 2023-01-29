<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMypage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

     public function rules()
     {
        return [
            'image' => 'required',
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:20|unique:users',
        ];
     }

    public function attributes()
    {
        return [
            'image' => 'アイコン画像',
            'username' => 'ユーザネーム',
            'emailadd' => 'メールアドレス'
        ];
    }
}
