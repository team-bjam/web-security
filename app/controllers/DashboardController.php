<?php

namespace App\Controllers;

use App\Core\{App, Validator, Mail, Session};

class DashboardController {

    public function __construct()
    {
        $this->middleware = [
            'Authenticated'
        ];
    }

    public function index()
    {
        return view('dashboard');
    }

}