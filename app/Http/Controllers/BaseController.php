<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class BaseController extends Controller
{

    public function __construct()
    {
        $this->permissions = config('permissions');

        \View::share([
            'sidebar_menu' => config('menu'),
        ]);
    }

    public function update($data, $request)
    {

        foreach($request AS $key => $value)
        {
            if(isset($data->{$key}))
            {
                $data->{$key} = $request[$key];
            }
        }

        $data->save();
    }

    public function transformValidationErrors($messages)
    {
        $errors = [];

        foreach($messages AS $message)
        {
            foreach($message AS $key => $value)
            {
                array_push($errors, $value);
            }
        }

        return $errors;
    }
}
