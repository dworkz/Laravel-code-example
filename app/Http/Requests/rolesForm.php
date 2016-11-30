<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class rolesForm extends Request
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
            'role_title' => 'required',
            'role_slug' => 'required|alpha_dash|unique:roles,role_slug',
        ];
    }

    public function rules_update($id = 0)
    {
        return [
            'role_title' => 'required',
            'role_slug' => "required|alpha_dash|unique:roles,role_slug,$id",
        ];
    }

    public function messages()
    {
        return [

            'role_title.required' => 'Название роли обязательно к заполнению.',
            'role_slug.required' => 'Вы не заполнили slug.',
            'role_slug.unique' => 'Значение slug должно быть уникальным. Замените его на другое.',

        ];
    }
}
