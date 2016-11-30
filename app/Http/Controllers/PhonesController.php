<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Phones;
use App\Http\Requests\phoneForm;

class PhonesController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function postStore(Request $request)
    {
        $form = new phoneForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $phone = Phones::create($request->all());
            return redirect()->back()->with(['message' => 'Добавление прошло успешно.']);
        }

    }

    public function postUpdate(Request $request)
    {
        if($request->get('value') != '')
        {
            $phone = Phones::findOrfail($request->get('pk'));
            $phone->{$request->get('name')} = $request->get('value');
            $phone->save();

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
        $phone = Phones::findOrFail($id);

        $phone->is_main = $phone->is_main > 0 ? 0 : 1;
        $phone->save();

        return redirect()->back()->with(['message' => 'Операция прошла успешно.']);
    }

    public function getDestroy($id)
    {
        $phone = Phones::findOrFail($id);
        $phone->delete();

        return redirect()->back()->with(['message' => 'Удаление прошло успешно.']);
    }

}
