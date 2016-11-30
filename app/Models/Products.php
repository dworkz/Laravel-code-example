<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'qty',
        'unit',
        'price',
        'note_id',
    ];

    public $timestamps = false;

}
