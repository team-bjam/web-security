<?php

namespace App\Middleware;

use App\Core\App;

class Authenticated {
    public function handle()
    {
        if (App::get('auth')->check() === false) {
            redirect('login', [
                'status'    => 'You must log in to access this resource'
            ]);

            return false;
        }
        return true;
    }

}