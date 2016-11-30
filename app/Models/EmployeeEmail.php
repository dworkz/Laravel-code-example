<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeEmail extends Model
{
    protected $table = 'employee_email';
    protected $fillable = ['email', 'description', 'employee_id', 'is_main'];

    public function setEmailAttribute($email)
    {
        if(is_array($email))
        {
            $this->attributes['email'] = $email['0'];
        }
        else
        {
            $this->attributes['email'] = $email;
        }
    }
}
