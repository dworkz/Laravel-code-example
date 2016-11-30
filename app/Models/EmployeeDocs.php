<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDocs extends Model
{
    protected $table = 'employee_docs';
    protected $fillable = ['name', 'description', 'path_to_doc', 'employee_id'];

    public function setPathToDocAttribute($doc)
    {

        if($doc->getClientOriginalExtension())
        {
            $filename = str_random(12) . '.' . $doc->getClientOriginalExtension();

            $folder = date("my");

            $path = "docs/" . $folder . "/";

            if (!file_exists(public_path($path))) {
                mkdir(public_path($path), 0777, true);
            }

            $doc->move(public_path($path), $filename);

            $this->attributes['path_to_doc'] = $path . $filename;
        }
        else
        {
            $this->attributes['path_to_doc'] = $doc;
        }
    }

}
