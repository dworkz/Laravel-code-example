<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class personForm extends Request
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
            'person.fio.*' => 'required',
            'person.phone.*.number.*' => 'required_with:person.phone.*.name.*',
            'person.email.*.email.*' => 'required_with:person.email.*.name.*',
            'person.address.*.name.*' => 'required_with:person.address.*.description.*',
            'person.doc.*.name.*' => 'required_with:person.doc.*.path_to_doc.*',
            'person.doc.*.path_to_doc.*' => 'required_with:person.doc.*.name.*',
        ];
    }

    public function messages()
    {
        return [
            'person.fio.*.required' => 'Вы не заполнили фио сотрудника.',
            'person.phone.*.number.*.required_with' => 'Вы не заполнили номер телефона.',
            'person.email.*.email.*.required_with' => 'Вы не заполнили email.',
            'person.address.*.name.*.required_with' => 'Вы не заполнили адрес.',
            'person.doc.*.name.*.required_with' => 'Вы не заполнили название файла.',
            'person.doc.*.path_to_doc.*.required_with' => 'Вы не выбрали файл.',
        ];
    }
}
