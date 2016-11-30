<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'type_id',
        'is_businessman',
        'name',
        'short_name',
        'description',
        'inn',
        'kpp',
        'ogrn',
        'reestr_number',
        'okpo',
        'okved',
        'additional_info',
        'bank_details',
        'site',
        'is_archive',
    ];

    public static function getCompanyType($types, $response = 'json')
    {
        $result = [];
        foreach($types AS $key => $value)
        {
            $result[] = [
                'value' => $key,
                'text' => $value
            ];
        }

        return $response == 'json' ? json_encode($result) : $result ;
    }

    public static function getFormParams($company, $company_type)
    {
        return [

            [
                'id' => $company->id,
                'input_name' => 'type_id',
                'name' => $company_type[$company->type_id],
                'title' => 'Тип предприятия',
                'data-title' => '',
                'data-type' => 'select'
            ],
            [
                'id' => $company->id,
                'input_name' => 'name',
                'name' => $company->name,
                'title' => 'Название',
                'data-title' => 'Введите название',
                'data-type' => 'text',

            ],
            [
                'id' => $company->id,
                'input_name' => 'short_name',
                'name' => $company->short_name,
                'title' => 'Короткое название',
                'data-title' => 'Введите короткое название',
                'data-type' => 'text',
            ],
            [
                'id' => $company->id,
                'input_name' => 'description',
                'name' => $company->description,
                'title' => 'Описание',
                'data-title' => 'Введите описание',
                'data-type' => 'textarea',
            ],
            [
                'id' => $company->id,
                'input_name' => 'inn',
                'name' => $company->inn,
                'title' => 'ИНН',
                'data-title' => 'Введите ИНН',
                'data-type' => 'text',
            ],
            [
                'id' => $company->id,
                'input_name' => 'kpp',
                'name' => $company->kpp,
                'title' => 'КПП',
                'data-title' => '',
                'data-type' => 'text',
            ],
            [
                'id' => $company->id,
                'input_name' => 'ogrn',
                'name' => $company->ogrn,
                'title' => 'ОГРН',
                'data-title' => '',
                'data-type' => 'text',
            ],
            [
                'id' => $company->id,
                'input_name' => 'reestr_number',
                'name' => $company->reestr_number,
                'title' => trans('app.reestr_number'),
                'data-title' => '',
                'data-type' => 'text',
            ],
            [
                'id' => $company->id,
                'input_name' => 'okpo',
                'name' => $company->okpo,
                'title' => 'ОКПО',
                'data-title' => '',
                'data-type' => 'text',
            ],
            [
                'id' => $company->id,
                'input_name' => 'okved',
                'name' => $company->okved,
                'title' => trans('app.okved'),
                'data-title' => '',
                'data-type' => 'text',
            ],
            [
                'id' => $company->id,
                'input_name' => 'additional_info',
                'name' => $company->additional_info,
                'title' => 'Дополнительная информация',
                'data-title' => '',
                'data-type' => 'text',
            ],
            [
                'id' => $company->id,
                'input_name' => 'bank_details',
                'name' => $company->bank_details,
                'title' => 'Банковская информация',
                'data-title' => '',
                'data-type' => 'text',
            ],
            [
                'id' => $company->id,
                'input_name' => 'site',
                'name' => $company->site,
                'title' => 'Сайт',
                'data-title' => '',
                'data-type' => 'text',
            ],

            // ..
        ];
    }
}