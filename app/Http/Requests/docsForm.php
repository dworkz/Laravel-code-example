<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class docsForm extends Request
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
            'doc.name.*' => 'required',
            'doc.path_to_doc.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'doc.name.*.required' => 'Вы не заполнили название.',
            'doc.path_to_doc.*.required' => 'Вы не выбрали документ.',
        ];
    }

}
