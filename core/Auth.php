<?php

namespace App\Core;

use App\Core\Session;
use App\Models\User;

class Auth {

    public $user;

    public function __construct()
    {
        if (isset($_SESSION['user_id'])) {
            $this->user = User::findById($_SESSION['user_id']);
        }
    }

    public function check() 
    {
        return isset($_SESSION['user_id']);
    }
}