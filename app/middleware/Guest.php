<?php

namespace App\Middleware;

use App\Core\App;

class Guest {


    public function handle()
    {
        if (App::get('auth')->check()) {
            redirect('dashboard');

            return false;
        }

        return true;
    }

}