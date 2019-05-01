<?php

use App\Core\{App, Auth, Session, Mail};
use App\Core\Database\{QueryBuilder, Connection};
use Philo\Blade\Blade;

App::bind('config', require 'config.php');

Session::start();

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

App::bind('auth', new Auth());

App::bind('mail', new Mail);






