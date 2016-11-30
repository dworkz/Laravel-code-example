<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = [
        'name',
        'description',
        'company_id',
        'person_id',
        'is_main'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = is_array($name) ? $name['0'] : $name;
    }

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = is_array($description) ? $description['0'] : $description;
    }

}
