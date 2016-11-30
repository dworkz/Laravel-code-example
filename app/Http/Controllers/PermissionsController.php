<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Permissions;
use App\Http\Requests;
use App\Http\Requests\permissonsForm;
use App\User;

class PermissionsController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUpdate($user_id)
    {

        $user = User::findOrFail($user_id);
        $employee = Employee::findOrFail($user->employee_id);

        return view('backend.permission.update', [
            'title' => 'Права доступа',
            'user' => $user,
            'employee' => $employee,
            'permissions' => $this->permissions,
            'user_access' => json_decode($user->access, TRUE)
        ]);
    }

    public function postUpdate(Request $request, $user_id)
    {

        $user = User::findOrFail($user_id);
        $user->access = json_encode($request->except('_token'));
        $user->save();

        return redirect('backend/employee')->with(['message' => 'Обновление прав доступа прошло успешно.']);;
    }

    /*
    public function getIndex()
    {
        $permissions = Permissions::all();

        return view('backend.permission.index', [
            'title' => 'Права доступа',
            'permissions' => $permissions
        ]);
    }

    public function getAdd()
    {
        return view('backend.permission.add', [
            'title' => 'Добавить права доступа',
        ]);
    }

    public function postStore(Request $request)
    {
        $form = new permissonsForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            Permissions::create($request->all());

            return redirect('backend/permissions')->with(['message' => 'Добавление прошло успешно.']);
        }
    }

    public function getEdit($id)
    {
        $permission = Permissions::findOrFail($id);

        return view('backend.permission.edit', [
            'title' => 'Редактирование прав доступа',
            'permission' => $permission
        ]);
    }

    public function postUpdate(Request $request, $id)
    {
        $permission = Permissions::findOrFail($id);

        $form = new permissonsForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $this->update($permission, $request->all());
            return redirect('/backend/permissions')->with([
                'message' => 'Обновление прошло успешно.'
            ]);
        }
    }
*/
}
