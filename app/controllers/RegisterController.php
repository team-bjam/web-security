<?php

namespace App\Controllers;

use App\Core\{App, Validator, Mail, Session};
use App\Models\User;

class RegisterController
{
    public function __construct() 
    {
        $this->middleware = [
            'Guest'
        ];
    }
    
    /**
     * Show registration form.
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Save user in database  
     */
    public function store()
    {
        //get parameters
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email= $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['password_confirmation'];

        //validate
        $validator = new Validator([
            'first_name'    => [
                'value' => $first_name,
                'rules' => 'required|min:2|max:255' 
            ],
            'last_name'     => [
                'value' => $last_name,
                'rules' => 'required|min:2|max:255' 
            ],
            'email'         => [
                'value' => $email,
                'rules' => 'required|email|unique:users,email'

            ],
            'password'      => [
                'value' => $password,
                'rules' => 'required|password'
            ],
            'password_confirmation' => [
                'value' => $confirm_password,
                'rules' => 'sameAs:password'
            ]
        ]);

        if($validator->passes === false) {
            //return to register view with errors
            return redirect('/register', [
                'errors'    => $validator->errors,
                'inputs'    => [
                    'first_name'    => $first_name,
                    'last_name'     => $last_name,
                    'email'         => $email
                ]
            ]);
        } 

        //store user in the database
        $user = User::create([
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'email'         => $email,
            'password'      => password_hash($password, PASSWORD_DEFAULT)   
        ]);

        $this->sendConfirmationEmail($user);

        //redirect user to view that shows they need to 
        //go to their email and click on the confirmation link
        return redirect('/login', [
            'status'    => 'Confirmation email has been sent to you. Please click on the link in it to continue.'
        ]);
    }

    public function confirm() 
    {
        $token = $_GET['token'];
        $email = $_GET['email'];
        
        $users = User::where([
            'token'     => $token,
            'email'     => $email
        ]);


        if (count($users) === 0) {

            //This user does not exist
            return redirect('register', [
                'status'    => 'User not found.'
            ]);
        }

        $user = new User($users[0]);

        if($user->active === "1") {
            return redirect('login', [
                'status'    => 'User was confirmed previously, please login'
            ]);
        } 

        //set user to active
        $user->update([
            'active'    => 1
        ]);

        //redirect to login view
        return redirect('login', [
            'status'    => 'Your account is confirmed, please log in'
        ]);    
    }

    private function sendConfirmationEmail($user)
    {   
        //prepare html content for the email
        $mail = Mail::prepare('emails.confirmation', [
            'name'  => $user->first_name,
            'email' => $user->email,
            'token' => $user->token
        ]);

        //send confirmation email
        App::get('mail')->send($user->email, 'Please confirm account', $mail);
    }

}
