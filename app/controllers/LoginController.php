<?php

namespace App\Controllers;

use App\Core\{App, Validator, Session};
use App\Models\User;

class LoginController
{

    public function __construct() 
    {
        $this->middleware = [
            'Guest',
            'LoginLockout'  => [
                'only'  => [
                    'store'
                ]
            ]
        ];
    }
    /**
     * Show login form.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Log user in the system.
     */
    public function store()
    {    
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $validator = new Validator([
            'email'    => [
                'value' => $email,
                'rules' => 'required' 
            ],
            'password'    => [
                'value' => $password,
                'rules' => 'required' 
            ]
        ]);

        if($validator->passes === false) {
            //return to login view with errors
            return redirect('/login', [
                'errors'    => $validator->errors,
                'inputs'    => [
                    'email'    => $email
                ]
            ]);
        } 

        $users = User::where([
            'email'     => $email,
            'active'    => 1
        ]);
        
        //no user with email found
        if(count($users) == 0){
            $this->recordLoginAttempt();

            return redirect('login', [
                'status'    => 'Email and/or password was not correct'
            ]);
        }

        $user = new User($users[0]);

        //incorrect passwrod
        if ($user->verifyPassword($password) === false) {
            $this->recordLoginAttempt();

            return redirect('login', [
                'status'    => 'Email and/or password was not correct'
            ]);
        }

        $user->login();

        return redirect('dashboard', [
            'status' => 'Welcome, '.$user->first_name
        ]);
    }

    private function recordLoginAttempt()
    {    
        Session::put('login_attempts', Session::has('login_attempts') ? Session::get('login_attempts') + 1 : 1);
        Session::put('last_login_attempt', time());
    }

}
