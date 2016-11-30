<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\EmployeeDocs;
use App\Models\EmployeeEmail;
use App\Models\EmployeePhone;
use App\User;
use App\Http\Requests\employeeForm;
use App\Http\Requests;
use DB;
use League\Flysystem\Exception;

class EmployeeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        $employee = Employee::all();

        return view('backend.employee.index', [
            'title' => 'Сотрудники',
            'employee' => $employee
        ]);
    }

    public function getAdd()
    {
        return view('backend.employee.add', [
            'title' => 'Добавить сотрудника',
        ]);
    }

    public function postStore(Request $request)
    {
        $form = new employeeForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());
        //dd($form->rules());
        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {

            //DB::beginTransaction();

            //try
            //{
                //dd($request->all());


                $employee = Employee::create($request->all());
                $password = str_random(12);
                $user = User::create([
                    'password' => $password,
                    'email' => $request->get('main_email'),
                    'employee_id' => $employee->id
                ]);

                \Mail::send('emails.send_password', ['password' => $password], function($message) use ($user)
                {
                    $message->from(config('mail.sender'), config('app.short_name'))->to($user->email)->subject('Доступ к сервису');
                });

                // todo добавление пользователя копирование фио и почты
                // todo отправка пароля

                for($p=0; $p < count($request->get('phone')['number']); $p++)
                {
                    if($request->get('phone')['number'][$p])
                    {
                        EmployeePhone::create([
                            'phone' => $request->get('phone')['number'][$p],
                            'description' => $request->get('phone')['name'][$p],
                            'employee_id' => $employee->id
                        ]);
                    }
                }

                for($e=0; $e < count($request->get('email')['email']); $e++)
                {
                    if($request->get('email')['email'][$e] != '')
                    {
                        EmployeeEmail::create([
                            'email' => $request->get('email')['email'][$e],
                            'description' => $request->get('email')['name'][$e],
                            'employee_id' => $employee->id
                        ]);
                    }
                }

                for($a=0; $a < count($request->get('address')['name']); $a++)
                {
                    if($request->get('address')['name'][$a] != '')
                    {
                        EmployeeAddress::create([
                            'name' => $request->get('address')['name'][$a],
                            'description' => $request->get('address')['description'][$a],
                            'employee_id' => $employee->id
                        ]);
                    }
                }



                for($d=0; $d < count($request->get('doc')['name']); $d++)
                {
                    if($request->get('doc')['name'][$d] != '')
                    {
                        EmployeeDocs::create([
                            'name' => $request->get('doc')['name'][$d],
                            'path_to_doc' => $request->file('doc')['path_to_doc'][$d],
                            'employee_id' => $employee->id
                        ]);
                    }
                }

                //DB::commit();

                return redirect('/backend/employee')->with([
                    'message' => 'Добавление прошло успешно. Данные для входа отправлены на почту.'
                ]);
/*
            }
            catch(\Exception $e)
            {
                 DB::rollback();

                return redirect('/backend/employee')->with(['message' => 'Произошла ошибка, при повторении обратитесь к администратору.']);
            }
*/
        }
    }

    public function postPhoneAdd(Request $request)
    {
        $html = view('backend.employee._phone_add', [
            'phone_number_form' => $request->get('number')
        ])->render();
        return \Response::json(['html' => $html]);
    }

    public function postEmailAdd(Request $request)
    {
        $html = view('backend.employee._email_add', ['email_number_form' => $request->get('number')])->render();
        return \Response::json(['html' => $html]);
    }

    public function postAddressAdd(Request $request)
    {
        $html = view('backend.employee._address_add', ['address_number_form' => $request->get('number')])->render();
        return \Response::json(['html' => $html]);
    }

    public function postDocAdd(Request $request)
    {
        $html = view('backend.employee._doc_add', ['doc_number_form' => $request->get('number')])->render();
        return \Response::json(['html' => $html]);
    }

    public function getDocs($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $docs = EmployeeDocs::where('employee_id', $employee_id)->get();

        return view('backend.employee.docs', [
            'title' => 'Список документов',
            'employee' => $employee,
            'docs' => $docs
        ]);

    }

    public function getDocsDestroy($id)
    {
        $docs = EmployeeDocs::findOrFail($id);
        unlink($docs->path_to_doc);
        $docs->delete();

        return redirect()->back()->with(['message' => 'Удаление прошло усепшно.']);
    }

    public function postDocsStore(Request $request, $employee_id)
    {
        $employee = Employee::findOrFail($employee_id);

        $form = new employeeForm();
        $validator = \Validator::make($request->all(), $form->rules_docs(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $doc = EmployeeDocs::create([
                'name' => $request->get('doc')['name'][0],
                'path_to_doc' => $request->file('doc')['path_to_doc'][0],
                'employee_id' => $employee->id
            ]);

            return redirect()->back()->with(['message' => 'Добавление прошло успешно.']);
        }
    }

    public function getAddress($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $address = EmployeeAddress::where('employee_id', $employee_id)->get();

        return view('backend.employee.address', [
            'title' => 'Список адресов',
            'employee' => $employee,
            'address' => $address
        ]);

    }

    public function getAddressMain($id)
    {
        $address = EmployeeAddress::findOrFail($id);

        $address->is_main = $address->is_main > 0 ? 0 : 1;
        $address->save();

        return redirect()->back()->with(['message' => 'Операция прошла успешно.']);
    }

    public function postAddressStore(Request $request, $employee_id)
    {
        $employee = Employee::findOrFail($employee_id);

        $form = new employeeForm();
        $validator = \Validator::make($request->all(), $form->rules_address(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $address = EmployeeAddress::create([
                'name' => $request->get('address')['name'][0],
                'description' => $request->get('address')['description'][0],
                'employee_id' => $employee_id,
            ]);

            return redirect()->back()->with(['message' => 'Добавление прошло успешно.']);
        }
    }

    public function getAddressDestroy($id)
    {
        $address = EmployeeAddress::findOrFail($id);
        $address->delete();

        return redirect()->back()->with(['message' => 'Удаление прошло усепшно.']);
    }

    public function getEmail($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $email = EmployeeEmail::where('employee_id', $employee_id)->get();

        return view('backend.employee.email', [
            'title' => 'Список email',
            'employee' => $employee,
            'email' => $email
        ]);

    }

    public function getEmailMain($id)
    {
        $email = EmployeeEmail::findOrFail($id);

        $email->is_main = $email->is_main > 0 ? 0 : 1;
        $email->save();

        return redirect()->back()->with(['message' => 'Операция прошла успешно.']);
    }

    public function postAddPhone(Request $request)
    {
        $form = new employeeForm();
        $validator = \Validator::make($request->all(), $form->rules_phone(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            EmployeePhone::create([
                'phone' => $request->get('phone')['number'][0],
                'description' => $request->get('phone')['name'][0],
                'employee_id' => $request->get('employee_id')
            ]);

            return redirect()->back()->with(['message' => 'Обновление прошло успешно.']);
        }


    }

    public function postEmailStore(Request $request, $employee_id)
    {
        $employee = Employee::findOrFail($employee_id);

        $form = new employeeForm();
        $validator = \Validator::make($request->all(), $form->rules_email(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {

            $email = EmployeeEmail::create([
                'email' => $request->get('email')['email'][0],
                'description' => $request->get('email')['description'][0],
                'employee_id' => $employee_id,
            ]);

            return redirect()->back()->with(['message' => 'Добавление прошло успешно.']);
        }
    }

    public function getEmailDestroy($id)
    {
        $email = EmployeeEmail::findOrFail($id);
        $email->delete();

        return redirect()->back()->with(['message' => 'Удаление прошло усепшно.']);
    }

    public function getPhone($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $phones = EmployeePhone::where('employee_id', $employee_id)->get();

        return view('backend.employee.phone', [
            'title' => 'Список телефонов',
            'employee' => $employee,
            'phones' => $phones
        ]);

    }

    public function getPhoneMain($id)
    {
        $phone = EmployeePhone::findOrFail($id);

        $phone->is_main = $phone->is_main > 0 ? 0 : 1;
        $phone->save();

        return redirect()->back()->with(['message' => 'Операция прошла успешно.']);
    }

    public function getPhoneDestroy($id)
    {
        $phone = EmployeePhone::findOrFail($id);
        $phone->delete();

        return redirect()->back()->with(['message' => 'Удаление прошло успешно.']);
    }

    public function getEdit($id)
    {
        $employee = Employee::findOrFail($id);
        $phones = EmployeePhone::where('employee_id', $id)->get();
        $email = EmployeeEmail::where('employee_id', $id)->get();
        $address = EmployeeAddress::where('employee_id', $id)->get();
        $docs = EmployeeDocs::where('employee_id', $id)->get();

        return view('/backend/employee/edit', [
            'title' => 'Информация о сотруднике',
            'employee' => $employee,
            'phones' => $phones,
            'email' => $email,
            'address' => $address,
            'docs' => $docs
        ]);
    }

    public function getView($id)
    {
        $employee = Employee::findOrFail($id);
        $phones = EmployeePhone::where('employee_id', $id)->get();
        $email = EmployeeEmail::where('employee_id', $id)->get();
        $address = EmployeeAddress::where('employee_id', $id)->get();
        $docs = EmployeeDocs::where('employee_id', $id)->get();

        return view('/backend/employee/view', [
            'title' => 'Информация о сотруднике',
            'employee' => $employee,
            'phones' => $phones,
            'email' => $email,
            'address' => $address,
            'docs' => $docs
        ]);
    }

    public function postUpdate(Request $request)
    {
        /*
              "name" => "fio"
              "value" => "treteterw1111"
              "pk" => "9"
         */

        if($request->get('value') != '')
        {
            $employee = Employee::findOrfail($request->get('pk'));
            $employee->{$request->get('name')} = $request->get('value');
            $employee->save();

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

    public function postUpdateMainEmail(Request $request)
    {
        $user = User::findOrFail($request->get('pk'));

        $form = new employeeForm();
        $validator = \Validator::make($request->all(), $form->rules_main_email($user->id), $form->messages_main_email());

        if($validator->fails())
        {
            return \Response::json([
                'status' => 'error',
                'msg' => implode(', ', $this->transformValidationErrors($validator->messages()->messages()))
            ]);
        }
        else
        {
            $user->email = $request->get('value');
            $user->save();

            return \Response::json(['status' => 'success']);
        }
    }

    public function postUpdatePhone(Request $request)
    {
        if($request->get('value') != '')
        {
            $phone = EmployeePhone::findOrFail($request->get('pk'));
            $name = explode('-', $request->get('name'));
            $phone->{$name[0]} = $request->get('value');
            $phone->save();

            return \Response::json(['status' => 'success']);
        }
        else
        {
            return \Response::json(['status' => 'error', 'msg' => 'Вы не заполнили поле.']);
        }
    }

    public function postUpdateEmail(Request $request)
    {
        if($request->get('value') != '')
        {
            $email = EmployeeEmail::findOrFail($request->get('pk'));
            $name = explode('-', $request->get('name'));
            $email->{$name[0]} = $request->get('value');
            $email->save();

            return \Response::json(['status' => 'success']);
        }
        else
        {
            return \Response::json(['status' => 'error', 'msg' => 'Вы не заполнили поле.']);
        }
    }

    public function postUpdateAddress(Request $request)
    {
        if($request->get('value') != '')
        {
            $address = EmployeeAddress::findOrFail($request->get('pk'));
            $name = explode('-', $request->get('name'));
            $address->{$name[0]} = $request->get('value');
            $address->save();

            return \Response::json(['status' => 'success']);
        }
        else
        {
            return \Response::json(['status' => 'error', 'msg' => 'Вы не заполнили поле.']);
        }
    }

    public function postUpdateDocs(Request $request)
    {
        if($request->get('value') != '')
        {
            $docs = EmployeeDocs::findOrFail($request->get('pk'));
            $name = explode('-', $request->get('name'));
            $docs->{$name[0]} = $request->get('value');
            $docs->save();

            return \Response::json(['status' => 'success']);
        }
        else
        {
            return \Response::json(['status' => 'error', 'msg' => 'Вы не заполнили поле.']);
        }
    }

}
