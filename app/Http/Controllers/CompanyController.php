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
use App\Http\Requests\companyForm;

class CompanyController extends BaseController
{
    protected $companyType;

    public function __construct()
    {
        parent::__construct();

        $this->companyType = config('app.company_type');
    }

    public function getIndex()
    {
        // @todo возможно разделить по типам
        $company = Company::all();

        return view('backend.company.index', [
            'title' => 'Компании',
            'company' => $company,
            'company_type' => $this->companyType
        ]);
    }

    public function getAdd()
    {
        return view('backend.company.add', [
            'title' => 'Добавить компанию',
            'company_type' => $this->companyType
        ]);
    }

    public function postStore(Request $request)
    {

        //dd($request->all());

        $form = new companyForm();
        $validator = \Validator::make($request->all(), $form->rules(), $form->messages());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $company = Company::create($request->all());

            for($i = 0; $i < count($request->get('person')['fio']); $i++)
            {
                $person = Persons::create([
                    'fio' => $request->get('person')['fio'][$i],
                    'position' => $request->get('person')['position'][$i],
                    'company_id' => $company->id,
                ]);

                for($p = 0; $p < count($request->get('person')['phone'][$i]['number']); $p++)
                {
                    if($request->get('person')['phone'][$i]['number'][$p] != '')
                    {
                        Phones::create([
                            'number' => $request->get('person')['phone'][$i]['number'][$p],
                            'name' => $request->get('person')['phone'][$i]['name'][$p],
                            'company_id' => $company->id,
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
                            'company_id' => $company->id,
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
                            'company_id' => $company->id,
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
                            'company_id' => $company->id,
                            'person_id' => $person->id
                        ]);
                    }
                }
            }

            return redirect('/backend/company')->with([
                'message' => 'Добавление прошло успешно.'
            ]);
        }
    }

    public function getEdit($id)
    {
        $company = Company::findOrFail($id);
        $persons = Persons::where('company_id', $id)->get();

        $data_form = Company::getFormParams($company, $this->companyType);
        $type_source = Company::getCompanyType($this->companyType);

        return view('backend.company.edit', [
            'title' => 'Карточка предприятия',
            'company' => $company,
            'data_form' => $data_form,
            'type_source' => $type_source,
            'persons' => $persons,
        ]);
    }

    public function getView($id)
    {
        $company = Company::findOrFail($id);
        $persons = Persons::where('company_id', $id)->get();

        $data_form = Company::getFormParams($company, $this->companyType);
        $type_source = Company::getCompanyType($this->companyType);

        return view('backend.company.view', [
            'title' => 'Карточка предприятия',
            'company' => $company,
            'data_form' => $data_form,
            'type_source' => $type_source,
            'persons' => $persons,
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
            $company = Company::findOrfail($request->get('pk'));
            $company->{$request->get('name')} = $request->get('value');
            $company->save();

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

    public function postUpdatePerson(Request $request)
    {
        if($request->get('value') != '')
        {
            $person = Persons::findOrfail($request->get('pk'));
            $name = explode('-', $request->get('name'));
            $person->{$name[0]} = $request->get('value');
            $person->save();

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

    public function postUpdatePhone(Request $request)
    {
        if($request->get('value') != '')
        {
            $phone = Phones::findOrfail($request->get('pk'));
            $name = explode('-', $request->get('name'));
            $phone->{$name[0]} = $request->get('value');
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

    public function postUpdateEmail(Request $request)
    {
        if($request->get('value') != '')
        {
            $email = Emails::findOrfail($request->get('pk'));
            $name = explode('-', $request->get('name'));
            $email->{$name[0]} = $request->get('value');
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

    public function postUpdateAddress(Request $request)
    {
        if($request->get('value') != '')
        {
            $address = Address::findOrfail($request->get('pk'));
            $name = explode('-', $request->get('name'));
            $address->{$name[0]} = $request->get('value');
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

    public function postUpdateDoc(Request $request)
    {
        if($request->get('value') != '')
        {
            $doc = Docs::findOrfail($request->get('pk'));
            $name = explode('-', $request->get('name'));
            $doc->{$name[0]} = $request->get('value');
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

    public function postPersonAdd(Request $request)
    {
        $html = view('backend.company._add_person', [
            'number_person_form' => $request->get('number_person_form')
        ])->render();

        return \Response::json(['html' => $html]);
    }

    public function postPersonPhoneAdd(Request $request)
    {
        $html = view('backend.company._add_person_phone', [
            'phone_number_form' => $request->get('number'),
            'number_person_form' => $request->get('person'),
        ])->render();

        return \Response::json(['html' => $html]);
    }

    public function postPersonEmailAdd(Request $request)
    {
        $html = view('backend.company._add_person_email', [
            'email_number_form' => $request->get('number'),
            'number_person_form' => $request->get('person'),
        ])->render();

        return \Response::json(['html' => $html]);
    }

    public function postPersonAddressAdd(Request $request)
    {
        $html = view('backend.company._add_person_address', [
            'address_number_form' => $request->get('number'),
            'number_person_form' => $request->get('person'),
        ])->render();

        return \Response::json(['html' => $html]);
    }

    public function postPersonDocAdd(Request $request)
    {
        $html = view('backend.company._add_person_doc', [
            'doc_number_form' => $request->get('number'),
            'number_person_form' => $request->get('person'),
        ])->render();

        return \Response::json(['html' => $html]);
    }

    /* todo delete old method */
    /*
    public function getPhones($company_id)
    {
        $company = Company::findOrFail($company_id);
        $phones = Phones::where('company_id', $company_id)->get();

        return view('backend.company.phones', [
            'title' => 'Управление телефонами',
            'company' => $company,
            'phones' => $phones,
        ]);
    }

    public function getEmails($company_id)
    {
        $company = Company::findOrFail($company_id);
        $emails = Emails::where('company_id', $company_id)->get();

        return view('backend.company.emails', [
            'title' => 'Управление email',
            'company' => $company,
            'emails' => $emails,
        ]);
    }

    public function getAddress($company_id)
    {
        $company = Company::findOrFail($company_id);
        $address = Address::where('company_id', $company_id)->get();

        return view('backend.company.address', [
            'title' => 'Управление адресами',
            'company' => $company,
            'address' => $address,
        ]);
    }

    public function getDocs($company_id)
    {
        $company = Company::findOrFail($company_id);
        $docs = Docs::where('company_id', $company_id)->get();

        return view('backend.company.docs', [
            'title' => 'Управление документами',
            'company' => $company,
            'docs' => $docs,
            'input_name' => 'company_id',
            'input_value' => $company->id,
            'folder' => 'company',
        ]);
    }
    */


}
