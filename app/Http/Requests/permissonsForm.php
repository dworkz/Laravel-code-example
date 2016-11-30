<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class permissonsForm extends Request
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

            'permission_title' => 'required',
            'permission_slug' => 'required',

        ];
    }

    public function messages()
    {
        return [

            'permission_title.required' => 'Вы не заполнили название.',
            'permission_slug.required' => 'Вы не заполнили slug.',

        ];
    }
}
