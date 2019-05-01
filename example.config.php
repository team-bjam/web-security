<?php

return [
    'database' => [
        'name' => '',
        'username' => '',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    // these are needed for sending emails
    // you can use mailtrap.io, very simple to use
    'mail'  => [
        'host'      => '',
        'port'      => '',
        'username'  => '',
        'password'  => ''
    ],
    'rootPath' => __DIR__,
    'rootUrl'  => '',
    'schema'   => 'http://'
];
