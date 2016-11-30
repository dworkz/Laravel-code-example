<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    protected $table = 'phones';
    protected $fillable = [
        'name',
        'number',
        'company_id',
        'person_id',
        'is_main'
    ];

    public function setNumberAttribute($number)
    {
        $this->attributes['number'] = is_array($number) ? $number['0'] : $number;
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = is_array($name) ? $name['0'] : $name;
    }

}
