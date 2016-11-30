<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class companyForm extends Request
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
            'type_id' => 'required',
            'person.fio.*' => 'required_with:person.position.*',
            'person.phone.*.number.*' => 'required_with:person.phone.*.name.*',
            'person.email.*.email.*' => 'required_with:person.email.*.name.*',
            'person.address.*.name.*' => 'required_with:person.address.*.description.*',
            'person.doc.*.name.*' => 'required_with:person.doc.*.path_to_doc.*',
            //'person.doc.*.path_to_doc.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Вы не заполнили название.',
            'type_id.required' => 'Вы не выбрали тип предприятия.',
            'person.fio.*.required_with' => 'Вы не заполнили фио сотрудника.',
            'person.phone.*.number.*.required_with' => 'Вы не заполнили номер телефона.',
            'person.email.*.email.*.required_with' => 'Вы не заполнили email.',
            'person.address.*.name.*.required_with' => 'Вы не заполнили адрес.',
            'person.doc.*.name.*.required_with' => 'Вы не заполнили название файла.',
            //'person.doc.*.path_to_doc.*.required' => 'Вы не выбрали файл.',
        ];
    }

}
