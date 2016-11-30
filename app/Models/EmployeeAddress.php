<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
    protected $table = 'employee_address';
    protected $fillable = ['name', 'description', 'employee_id', 'is_main'];

}
