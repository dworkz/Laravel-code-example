<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\usersForm;

class UsersController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

/*
    public function getIndex()
    {
        $users = User::all();

        return view('backend.users.index', [
            'title' => 'Пользователи',
            'users' => $users,
        ]);
    }

    public function getAdd()
    {
        return view('backend.users.add', [
            'title' => 'Добавить пользователя'
        ]);
    }


    public function postStore(Request $request)
    {
        $form = new usersForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $post = $request->all();
            $post['password'] = str_random(12);
            $user = User::create($post);

            \Mail::send('emails.send_password', ['password' => $post['password']], function($message) use ($user)
            {
                $message->from(config('mail.sender'), config('app.short_name'))->to($user->email)->subject('Доступ к сервису');
            });

            return redirect('/backend/users')->with([
                'message' => 'Добавление прошло успешно.',
            ]);

        }
    }


    public function getEdit($id)
    {
        $user = User::findOrFail($id);

        return view('backend.users.edit', [
            'title' => 'Редатирование информации о пользователе',
            'user' => $user
        ]);
    }


    public function postUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $form = new usersForm();
        $validator = \Validator::make($request->all(), $form->rules_update(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $this->update($user, $request->all());

            return redirect('/backend/users')->with([
                'message' => 'Обновление прошло успешно.'
            ]);
        }
    }

    public function getDestroy($id)
    {
        $user = User::findOrFail($id);

        $user->is_active = 0;
        $user->save();

        return redirect('/backend/users')->with([
            'message' => 'Удаление прошло успешно.',
        ]);
    }

    public function getActive($id)
    {
        $user = User::findOrFail($id);

        if($user->is_active > 0)
        {
            $user->is_active = 0;
            \DB::table('sessions')->where('user_id', $user->id)->delete();
        }
        else
        {
            $user->is_active = 1;
        }

        $user->save();

        return redirect()->back()->with(['message' => 'Операция прошла успешно.']);
    }
*/
}
