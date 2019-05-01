<?php

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Philo\Blade\Blade;

class Mail {

    private $mailer;

    public function __construct()
    {
        try {
            $this->mailer = new PHPMailer(true);
            $this->mailer->isSMTP();
            $this->mailer->Host = App::get('config')['mail']['host'];
            $this->mailer->SMTPAuth = true;
            $this->mailer->isHTML(true);
            $this->mailer->Username = App::get('config')['mail']['username'];                     
            $this->mailer->Password = App::get('config')['mail']['password'];       
            $this->mailer->SMTPSecure = 'tls';
            $this->mailer->Port  = App::get('config')['mail']['port'];
            $this->mailer->setFrom(App::get('config')['mail']['from_address'], 'Web security');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function send($email, $subject, $body) {
        try {
            $this->mailer->addAddress($email);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            
            $this->mailer->send();
        } catch (Exception $e) {
            dd($e);
        }
        
    }

    public static function prepare($name, $data)
    {
        $views = [App::get('config')['rootPath']. '/app/views'];
        $cache = App::get('config')['rootPath'] . '/app/cache';

        $blade = new Blade($views, $cache);

        return $blade->view()->make($name, $data)->render();
    }
}