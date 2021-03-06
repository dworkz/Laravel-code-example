<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class emailsForm extends Request
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
            'email.*' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'email.*.required' => 'Вы не ввели email.',
            'email.*.email' => 'Такого email не существует.',
        ];
    }

}
