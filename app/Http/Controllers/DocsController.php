<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Docs;
use App\Http\Requests\docsForm;

class DocsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function postStore(Request $request)
    {
        $form = new docsForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            for($p = 0; $p < count($request->get('doc')['name']); $p++)
            {
                if($request->get('doc')['name'][$p] != '')
                {
                    Docs::create([
                        'name' => $request->get('doc')['name'][$p],
                        'path_to_doc' => $request->file('doc')['path_to_doc'][$p],
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
            $doc = Docs::findOrfail($request->get('pk'));
            $doc->{$request->get('name')} = $request->get('value');
            $doc->save();

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

    public function getDestroy($id)
    {
        $doc = Docs::findOrFail($id);
        unlink($doc->path_to_doc);
        $doc->delete();

        return redirect()->back()->with(['message' => 'Удаление прошло успешно.']);
    }


}
