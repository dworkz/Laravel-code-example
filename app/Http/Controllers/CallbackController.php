<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallbackController extends Controller
{

    public function postForm(Request $request)
    {
        $result = \Mail::send('emails.callback', $request->all(), function($message) {
            $message->from('no-reply@sdom.ru', 'Свой дом')->to('kolesnikov@airmail.ru')->subject('Обратный звонок');
        });

        if($result)
        {
            return 'В ближайшее время с Вами свяжется наш менеджер.';
        }
        else
        {
            return 'При отправке произошла ошибка. Повторите попытку.';
        }

    }

}