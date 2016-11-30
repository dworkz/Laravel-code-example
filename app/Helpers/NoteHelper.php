<?php namespace App\Helpers;

use App\Models\Employee;
use App\Models\Products;
use App\Models\Docs;

class NoteHelper
{
    public function employee($id)
    {
        $employee = Employee::find($id);
        return isset($employee->fio) ? $employee->fio : '';
    }

    public function products($note_id)
    {
         return Products::where('note_id', $note_id)->get();
    }

    public function docs($note_id)
    {
        return Docs::where('note_id', $note_id)->get();
    }

}