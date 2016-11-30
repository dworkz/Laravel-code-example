<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class usersForm extends Request
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function rules_update()
    {
        return [
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'Введите ФИО.',
            'email.required' => 'Введите email.',
            'email.email' => 'Такого email не существует, проверьте написание.',
            'email.unique' => 'Такой email уже используется в системе. Выберите другой.',
        ];
    }

}
