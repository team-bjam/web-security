<?php

namespace App\Models;

use App\Core\{App, Session};
use App\Utils\RandomStringGenerator;

class User {

    public function __construct($data)
    {
        foreach($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function update(array $parameters) 
    {
        App::get('database')->update('users', $parameters, [
            'id'    => $this->id
        ]);
    }

    public static function create(array $parameters) 
    {
        //generate token
        $generator = new RandomStringGenerator();
        $token = $generator->generate(32);
        $parameters['token'] = $token;

        //create entry in the database
        $user_id = App::get('database')->insert('users', $parameters);

        //get data from the database using the new id
        $user_data = App::get('database')->findById('users', $user_id);

        return new User($user_data);

    }

    public static function where(array $parameters)
    {
        return App::get('database')->selectWhere('users', $parameters);
    }

    public static function findById($id) {
        return new User(App::get('database')->findById('users', $id));
    }

    public function login()
    {
        Session::login($this);
    }

    public function verifyPassword(string $password)
    {
        return password_verify($password, $this->password);
    }



}