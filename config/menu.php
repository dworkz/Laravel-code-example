<?php

return [
/*
    [
        'name' => 'Пользователи',
        'icon' => 'si si-users',
        'active' => [
            //'users',
            //'roles',
            'permissions',
        ],
        'items' => [
            //'/backend/users' => 'Список',
            //'/backend/roles' => 'Роли',
            '/backend/permissions/' => 'Права доступа',
        ],
    ],
*/
    [
        'name' => 'Сотрудники',
        'icon' => 'fa fa-users',
        'active' => [
            'users',
            'roles',
            'permissions',
        ],
        'items' => [
            '/backend/employee' => 'Список',

        ],
    ],

    [
        'name' => 'Компании',
        'icon' => 'fa fa-institution',
        'active' => [

        ],
        'items' => [
            '/backend/company' => 'Список',

        ],
    ],

    [
        'name' => 'Служебные записки',
        'icon' => 'si si-note',
        'active' => [

        ],
        'items' => [
            '/backend/note/new' => 'Список',

        ],
    ],

];