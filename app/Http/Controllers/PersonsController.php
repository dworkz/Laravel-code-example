<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Company;
use App\Models\Phones;
use App\Models\Emails;
use App\Models\Address;
use App\Models\Docs;
use App\Models\Persons;
use App\Http\Requests\personForm;

class PersonsController extends BaseController
{
    public function _construct()
    {
        parent::__construct();
    }

    public function postStore(Request $request)
    {
        $form = new personForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            for($i = 0; $i < count($request->get('person')['fio']); $i++)
            {
                $person = Persons::create([
                    'fio' => $request->get('person')['fio'][$i],
                    'position' => $request->get('person')['position'][$i],
                    'company_id' => $request->get('company_id'),
                ]);

                for($p = 0; $p < count($request->get('person')['phone'][$i]['number']); $p++)
                {
                    if($request->get('person')['phone'][$i]['number'][$p] != '')
                    {
                        Phones::create([
                            'number' => $request->get('person')['phone'][$i]['number'][$p],
                            'name' => $request->get('person')['phone'][$i]['name'][$p],
                            'company_id' => $request->get('company_id'),
                            'person_id' => $person->id
                        ]);
                    }
                }

                for($p = 0; $p < count($request->get('person')['email'][$i]['email']); $p++)
                {
                    if($request->get('person')['email'][$i]['email'][$p] != '')
                    {
                        Emails::create([
                            'email' => $request->get('person')['email'][$i]['email'][$p],
                            'name' => $request->get('person')['email'][$i]['name'][$p],
                            'company_id' => $request->get('company_id'),
                            'person_id' => $person->id
                        ]);
                    }
                }

                for($p = 0; $p < count($request->get('person')['address'][$i]['name']); $p++)
                {
                    if($request->get('person')['address'][$i]['name'][$p] != '')
                    {
                        Address::create([
                            'name' => $request->get('person')['address'][$i]['name'][$p],
                            'description' => $request->get('person')['address'][$i]['description'][$p],
                            'company_id' => $request->get('company_id'),
                            'person_id' => $person->id
                        ]);
                    }
                }

                for($d = 0; $d < count($request->get('person')['doc'][$i]['name']); $d++)
                {
                    if($request->get('person')['doc'][$i]['name'][$d] != '')
                    {
                        Docs::create([
                            'name' => $request->get('person')['doc'][$i]['name'][$d],
                            'path_to_doc' => $request->file('person')['doc'][$i]['path_to_doc'][$d],
                            'company_id' => $request->get('company_id'),
                            'person_id' => $person->id
                        ]);
                    }
                }
            }

            return redirect()->back()->with([
                'message' => 'Добавление прошло успешно.'
            ]);
        }
    }

}
