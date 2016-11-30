<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class LoginController extends Controller
{

    public function getIndex()
    {
        if(Auth::check())
        {
            return redirect('backend/dashboard');
        }

        return view('backend.auth.login', [

            'title' => 'Вход'

        ]);
    }

    public function postIndex()
    {
        $form = new Requests\loginForm();
        $validator = \Validator::make(\Request::all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput(\Request::all())->withErrors($validator->errors());
        }
        else
        {
            $remember = \Request::has('remember') ? 1 : 0;

            $login = Auth::attempt(['email' => \Request::input('email'), 'password' => \Request::input('password')], $remember);

            if($login AND Auth::user()->is_active > 0)
            {
                // todo переадресация в зависимости от прав пользователя
                return redirect('backend/dashboard')->with(['message' => 'Вы успешно вошли.']);
            }
            else
            {
                // Если пользователь не активный, произвести выход
                if(Auth::check())
                {
                    Auth::logout();
                }

                return redirect('/login')->with(['message' => 'Логин или пароль не верен.'])->withInput(\Request::all());
            }
        }
    }

    // todo forgot

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }


}
