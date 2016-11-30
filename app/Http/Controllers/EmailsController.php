<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Emails;
use App\Http\Requests\emailsForm;

class EmailsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function postStore(Request $request)
    {
        $form = new emailsForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $email = Emails::create($request->all());
            return redirect()->back()->with(['message' => 'Добавление прошло успешно.']);
        }
    }

    public function postUpdate(Request $request)
    {
        if($request->get('value') != '')
        {
            $email = Emails::findOrfail($request->get('pk'));
            $email->{$request->get('name')} = $request->get('value');
            $email->save();

            return \Response::json([
                'status' => 'success'
            ]);
        }
        else
        {
            return \Response::json([
                'status' => 'error',
                'msg' => 'Вы не заполнили поле.'
            ]);
        }
    }

    public function getMain($id)
    {
        $email = Emails::findOrFail($id);

        $email->is_main = $email->is_main > 0 ? 0 : 1;
        $email->save();

        return redirect()->back()->with(['message' => 'Операция прошла успешно.']);
    }

    public function getDestroy($id)
    {
        $email = Emails::findOrFail($id);
        $email->delete();

        return redirect()->back()->with(['message' => 'Удаление прошло успешно.']);
    }
}
