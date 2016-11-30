<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePhone extends Model
{
    protected $table = 'employee_phone';
    protected $fillable = ['phone', 'description', 'employee_id', 'is_main'];

    public function setPhoneAttribute($phone)
    {
        if(is_array($phone))
        {
            $this->attributes['phone'] = $phone['0'];
        }
        else
        {
            $this->attributes['phone'] = $phone;
        }
    }

}
