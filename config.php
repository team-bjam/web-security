<?php

return [
    'database' => [
        'name' => 'security',
        'username' => 'root',
        'password' => 'pepsimax',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'mail'  => [
        'host'      => 'smtp.mailtrap.io',
        'port'      => 2525,
        'username'  => 'bc1fcfc9b66f69',
        'password'  => '04beb5e1a31490',
        'from_address'  => 'web@security.com'
    ],
    'rootPath' => __DIR__,
    'rootUrl'  => 'security.test',
    'schema'   => 'http://'
];
