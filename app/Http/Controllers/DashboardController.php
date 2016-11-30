<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        return view('backend.dashboard.index', [

            'title' => 'Главная'

        ]);
    }
}
