<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class noteForm extends Request
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
            //'product.*.name' => 'required',
            'product.name.*' => 'required',
            'product.qty.*' => 'required|min:1|numeric',
            'product.price.*' => 'required|min:1|numeric',
            'docs.name.*' => 'required_with:docs.path_to_doc.*',
            'docs.path_to_doc.*' => 'required_with:docs.name.*',
        ];
    }

    public function rules_update()
    {
        return [
            'name' => 'required',
            'product.name.*' => 'required',
            'product.qty.*' => 'required|min:1|numeric',
            'product.price.*' => 'required|min:1|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('app.note_name_required'),
            'company_id.required' => 'Не выбрали компанию.',
            'product.name.*.required' => 'Вы не заполнили наименование товара или услуги.',
            'product.qty.*.required' => 'Вы не заполнили кол-во.',
            'product.qty.*.min' => 'Значение должно быть больше 1.',
            'product.qty.*.numeric' => 'Значение должно быть числом.',
            'product.unit.*.required' => 'Вы не заполнили ед. изм.',
            'product.price.*.required' => 'Вы не заполнили цену.',
            'product.price.*.min' => 'Значение должно быть больше 1.',
            'product.price.*.numeric' => 'Значение должно быть числом.',
            'docs.name.*.required_with' => 'Вы не заполнили название.',
            'docs.path_to_doc.*.required_with' => 'Вы не выбрали документ.',
        ];
    }

}
