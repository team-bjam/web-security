<?php

namespace App\Core;

class Session {
    
    public static function start()
    {
        session_start();
    }

    public static function login($user) {
        $_SESSION['user_id'] = $user->id;
    }

    public static function flash($data) 
    {
        $_SESSION['flash_data'] = $data;
    }

    public static function deleteFlashData()
    {
        unset($_SESSION['flash_data']);
    }

    public static function put($key, $data)
    {
        $_SESSION[$key] = $data;
    }

    public static function get($key)
    {
        return $_SESSION[$key];
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function forget($key)
    {
        unset($_SESSION[$key]);
    }
}