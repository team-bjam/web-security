<?php

namespace App\Middleware;

use App\Core\App;

class Authenticated {


    public function handle()
    {
        if (App::get('auth')->check() === false) {
            return redirect('login', [
                'status'    => 'You must log in to access this resource'
            ]);
        }
        return true;
    }

}