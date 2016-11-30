<?php namespace App\Helpers;

use App\Models\Address;
use App\Models\Docs;
use App\Models\Phones;
use App\Models\Emails;

class CompanyHelper
{

    public function personPhoneView($id, $person, $view)
    {
        $phones = Phones::where('person_id', $id)->get();
        return view('backend.persons._list_phones', ['phones' => $phones, 'person' => $person, 'view' => $view]);
    }

    public function personEmailView($id, $person, $view)
    {
        $emails = Emails::where('person_id', $id)->get();
        return view('backend.persons._list_emails', ['emails' => $emails, 'person' => $person, 'view' => $view]);
    }

    public function personDocView($id, $person, $view)
    {
        $docs = Docs::where('person_id', $id)->get();
        return view('backend.persons._list_docs', ['docs' => $docs, 'person' => $person, 'view' => $view]);
    }

    public function personAddressView($id, $person, $view)
    {
        $address = Address::where('person_id', $id)->get();
        return view('backend.persons._list_address', ['address' => $address, 'person' => $person, 'view' => $view]);
    }

}