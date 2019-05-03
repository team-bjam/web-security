<?php

namespace App\Middleware;

use App\Core\{App, Session};


class LoginLockout {


    public function handle()
    {
        //check if any log attempts are made nad if the attempts pass the number of allowed attempts
        if(Session::has('login_attempts') && Session::get('login_attempts') >= 3) {
            //find out how much time has passed since the last login attempt
            $time_since_last_login = time() - Session::get('last_login_attempt');

            //if less than 5 minutes have passsed, do not allow the user to attempt to log in again
            //until the timeout has passed
            if ($time_since_last_login < 300) {
                $lockout_time_remaining = 300 - $time_since_last_login;

                //reset the login attempt to the current time
                Session::put('last_login_attempt', time());
            
                //redirect user back to the login page and tell them that
                //they need to wait for 5 minutes before trying to log in again
                redirect('login', [
                    'status'    => "Too many login attempts, please wait {$lockout_time_remaining} seconds before trying again"
                ]);
                
                //return false for the router, so that it does not call the store method
                return false;

            }
            //timeout has passed, reset the counters and allow the user to log in 
            else if ($time_since_last_login > 300) {
                Session::forget('login_attempts');
                Session::forget('last_login_attempt');

                //middleware passes, this means that the router can call the method
                return true;
            }
            return true;
        }

        return true;
    }

}