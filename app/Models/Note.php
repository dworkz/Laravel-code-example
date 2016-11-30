<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Note extends Model
{
    protected $table = 'service_note';
    protected $fillable = [
        'parent_id',
        'employee_id',
        'name',
        'description',
        'is_archive',
        'visa_text',
        'is_accepted',
        'company_id',
        'accepted_date'
    ];

}
