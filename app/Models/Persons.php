<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Persons extends Model
{
    protected $table = 'person';
    protected $fillable = [
        'fio',
        'position',
        'company_id',
    ];

    public $timestamps = false;
}
