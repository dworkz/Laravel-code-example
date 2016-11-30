<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Note;
use App\Models\Employee;
use App\Models\Company;
use App\Models\Products;
use App\Models\Docs;
use App\Http\Requests\noteForm;

class NoteController extends BaseController
{
    public function __controller()
    {
        parent::__construct();
    }

    public function getNew()
    {
        // fixme выводить заявки только для to_employee_id

        $notes = Note::where('parent_id', 0)->where('is_accepted', 0)->where('is_archive', 0)->paginate(25);

        return view('backend.notes.index', [
            'title' => 'Новые служебные записки',
            'notes' => $notes
        ]);
    }

    public function getView($id)
    {
        $main_note = Note::findOrFail($id);
        $notes = Note::where('parent_id', $id)->get();
        $nDocs = Docs::where('note_id', $main_note->id)->get();
        $nProducts = Products::where('note_id', $main_note->id)->get();

        return view('backend.notes.view',[
            'title' => 'Просмотр служебной записки',
            'main_note' => $main_note,
            'notes' => $notes,
            'nDocs' => $nDocs,
            'nProducts' => $nProducts,
        ]);
    }

    public function getUpdate($parent_id = 0, $id = 0)
    {
        $note = Note::findOrFail($id);
        $docs = Docs::where('note_id', $note->id)->get();
        $products = Products::where('note_id', $note->id)->get();

        $companies = Company::all();

        return view('backend.notes.update',[
            'title' => 'Просмотр служебной записки',
            'note' => $note,
            'docs' => $docs,
            'products' => $products,
            'parent_id' => $parent_id,
            'companies' => $companies,
        ]);
    }

    public function postUpdate(Request $request)
    {
        $form = new noteForm();
        $validator = \Validator::make($request->all(), $form->rules_update(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            //dd($request->all());

            $note = Note::create($request->all());

            for($i = 0; $i < count($request->get('product')['name']); $i++)
            {
                Products::create([
                    'name' => isset($request->get('product')['name'][$i]) ? $request->get('product')['name'][$i] : '',
                    'qty' => $request->get('product')['qty'][$i],
                    'unit' => $request->get('product')['unit'][$i],
                    'price' => $request->get('product')['price'][$i],
                    'note_id' => $note->id,
                ]);

            }

            for($i = 0; $i < count($request->get('docs')['name']); $i++)
            {
                if($request->get('docs')['name'][$i] != '')
                {
                    Docs::create([
                        'name' => isset($request->get('docs')['name'][$i]) ? $request->get('docs')['name'][$i] : '',
                        'description' => $request->get('docs')['description'][$i],
                        'path_to_doc' => $request->file('docs')['path_to_doc'][$i] ,
                        'company_id' => isset($request->get('docs')['company_id'][$i]) ? $request->get('docs')['company_id'][$i] : 0,
                        'note_id' => $note->id,
                    ]);
                }


            }

            return redirect('/backend/note/new')->with([
                'message' => 'Добавление прошло успешно.',
            ]);

        }
    }

    public function getAdd($id = 0)
    {

        $employees = Employee::all();
        $companies = Company::all();

        return view('backend.notes.add', [
            'title' => 'Добавить записку',
            'employees' => $employees,
            'companies' => $companies,
            'parent_id' => $id
        ]);
    }

    public function postStore(Request $request)
    {

        //dd($request->all());

        $form = new noteForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $note = Note::create($request->all());

            for($i = 0; $i < count($request->get('product')['name']); $i++)
            {
                Products::create([
                    'name' => $request->get('product')['name'][$i],
                    'qty' => $request->get('product')['qty'][$i],
                    'unit' => $request->get('product')['unit'][$i],
                    'price' => $request->get('product')['price'][$i],
                    'note_id' => $note->id,
                ]);

            }

            for($i = 0; $i < count($request->get('docs')['name']); $i++)
            {
                if($request->get('docs')['name'][$i] != '')
                {
                    Docs::create([
                        'name' => isset($request->get('docs')['name'][$i]) ? $request->get('docs')['name'][$i] : '',
                        'description' => $request->get('docs')['description'][$i],
                        'path_to_doc' => $request->file('docs')['path_to_doc'][$i],
                        'company_id' => isset($request->get('docs')['company_id'][$i]) ?: 0,
                        'note_id' => $note->id,
                    ]);
                }


            }

            return redirect('/backend/note/new')->with([
                'message' => 'Добавление прошло успешно.',
            ]);
        }
    }

    public function postProductAdd(Request $request)
    {
        $html = view('backend.notes._products_form', ['number_form' => $request->get('number_form')])->render();
        return \Response::json(['html' => $html]);
    }

    public function postDocAdd(Request $request)
    {
        $html = view('backend.docs._form_add', ['number_form' => $request->get('number_form')])->render();
        return \Response::json(['html' => $html]);
    }

}
