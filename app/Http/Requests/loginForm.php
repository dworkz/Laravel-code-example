<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class loginForm extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'email' => 'required|email',
            'password' => 'required',

        ];
    }

    public function messages() {

        return [
            'email.required' => 'Email обязателен для заполнения',
            'email.email' => 'Введите правильный email',
            'password.required' => 'Пароль обязателен для заполнения'
        ];

    }

}
