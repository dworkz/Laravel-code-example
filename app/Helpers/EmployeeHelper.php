<?php namespace App\Helpers;

use App\Models\EmployeePhone;
use App\Models\EmployeeEmail;


class EmployeeHelper
{
    public function phone($employee_id = 0)
    {
        $phone = EmployeePhone::where('employee_id', $employee_id)->orderBy('is_main', 'DESC')->first();
        return isset($phone->phone) ? $phone->phone : '';
    }

    // todo delete in production
    /*
    public function email($employee_id = 0)
    {
        $email = EmployeeEmail::where('employee_id', $employee_id)->orderBy('is_main', 'DESC')->first();
        return isset($email->email) ? $email->email : '';
    }
    */

}

