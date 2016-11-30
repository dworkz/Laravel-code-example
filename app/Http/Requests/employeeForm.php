<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class employeeForm extends Request
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
            'main_email' => 'required|email|unique:users,email',

            'fio' => 'required',
            'position' => 'required',
            'inn' => 'required',
            'phone.number.*' => 'required_with:phone.name.*',
            'email.email.*' => 'required_with:email.name.*',
            'address.name.*' => 'required_with:address.description.*',
            'doc.name.*' => 'required_with:doc.path_to_doc.*',
            'doc.path_to_doc.*' => 'required_with:doc.name.*',
        ];
    }

    public function rules_main_email($id)
    {
        return [
            'value' => 'required|email|unique:users,email,' . $id,
        ];
    }

    public function rules_phone()
    {
        return [
            'phone.number.*' => 'required',
        ];
    }

    public function rules_email()
    {
        return [
            'email.email.*' => 'required|email',
        ];
    }

    public function rules_address()
    {
        return [
            'address.name.*' => 'required',
        ];
    }

    public function rules_docs()
    {
        return [
            'doc.name.*' => 'required',
            'doc.path_to_doc.*' => 'required',
        ];
    }

    public function messages_main_email()
    {
        return [
            'value.required' => 'Вы не ввели основной email',
            'value.email' => 'Такого email не существует, проверьте написание.',
            'value.unique' => 'Такой email уже используется в системе. Выберите другой.',
        ];
    }

    public function messages()
    {
        return [
            'main_email.required' => 'Вы не ввели основной email',
            'main_email.email' => 'Такого email не существует, проверьте написание.',
            'main_email.unique' => 'Такой email уже используется в системе. Выберите другой.',

            'fio.required' => 'Вы не заполнили ФИО.',
            'position.required' => 'Вы не заполнили должность.',
            'inn.required' => 'Вы не заполнили ИНН.',
            'phone.number.*.required' => 'Вы не ввели номер телефона.',
            'email.email.*.email' => 'Такого email не существует, проверьте написание.',
            'email.email.*.required' => 'Вы не заполнили email.',

            'address.name.*.required' => 'Вы не заполнили адрес.',
            'name.required' => 'Вы не заполнили название.',
            'path_to_doc.required' => 'Вы не выбрали документ.',
            'phone.number.*.required_with' => 'Вы не заполнили номер телефона.',
            'email.email.*.required_with' => 'Вы не заполнили email.',
            'address.name.*.required_with' => 'Вы не заполнили адрес.',
            'doc.name.*.required_with' => 'Вы не заполнили название файла.',
            'doc.path_to_doc.*.required_with' => 'Вы не выбрали файл.',
            'doc.name.*.required' => 'Вы не заполнили название файла.',
            'doc.path_to_doc.*.required' => 'Вы не выбрали файл.',
        ];
    }
}
