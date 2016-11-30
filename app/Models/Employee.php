<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'fio',
        'position',
        'note',
        'positive',
        'negative',
        'inn'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'employee_id', 'id');
    }

}
