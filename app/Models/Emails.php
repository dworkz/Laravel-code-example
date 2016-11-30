<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $table = 'emails';
    protected $fillable = [
        'name',
        'email',
        'company_id',
        'person_id',
        'is_main'
    ];

    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = is_array($email) ? $email['0'] : $email;
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = is_array($name) ? $name['0'] : $name;
    }

}
