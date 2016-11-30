<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Address;
use App\Http\Requests\addressForm;

class AddressController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function postStore(Request $request)
    {
        $form = new addressForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            for($p = 0; $p < count($request->get('address')['name']); $p++)
            {
                if($request->get('address')['name'][$p] != '')
                {
                    Address::create([
                        'name' => $request->get('address')['name'][$p],
                        'description' => $request->get('address')['description'][$p],
                        'company_id' => $request->get('company_id'),
                        'person_id' => $request->get('person_id')
                    ]);
                }
            }
            return redirect()->back()->with(['message' => 'Добавление прошло успешно.']);
        }
    }

    public function postUpdate(Request $request)
    {
        if($request->get('value') != '')
        {
            $address = Address::findOrfail($request->get('pk'));
            $address->{$request->get('name')} = $request->get('value');
            $address->save();

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
        $address = Address::findOrFail($id);

        $address->is_main = $address->is_main > 0 ? 0 : 1;
        $address->save();

        return redirect()->back()->with(['message' => 'Операция прошла успешно.']);
    }

    public function getDestroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return redirect()->back()->with(['message' => 'Удаление прошло успешно.']);
    }

}
