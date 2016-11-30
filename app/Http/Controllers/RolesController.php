<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\rolesForm;
use App\Models\Roles;

class RolesController extends BaseController
{

    public function _construct()
    {
        parent::__construct();
    }
/*
    public function getIndex()
    {
        $roles = Roles::all();

        return view('backend.roles.index', [

            'title' => 'Роли',
            'roles' => $roles

        ]);
    }

    public function getAdd()
    {
        return view('backend.roles.add', [
            'title' => 'Добавить роль'
        ]);
    }

    public function postStore(Request $request)
    {
        $form = new rolesForm();
        $validator = \Validator($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            Roles::create($request->all());

            return redirect('backend/roles')->with(['message' => 'Добавление прошло успешно.']);
        }

    }

    public function getEdit($id)
    {
        $role = Roles::findOrFail($id);

        return view('backend.roles.edit', [

            'title' => 'Редактирование',
            'role' => $role

        ]);
    }


    public function postUpdate(Request $request, $id)
    {

        $role = Roles::findOrFail($id);

        $form = new rolesForm();
        $validator = \Validator($request->all(), $form->rules_update($id), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $this->update($role, $request->all());
            return redirect('/backend/roles')->with([
                'message' => 'Обновление прошло успешно.'
            ]);
        }
    }
*/
}
