 <?php

/*
* Authentication routes
*/
$router->get('register', 'RegisterController@register');
$router->post('register', 'RegisterController@store');

$router->get('confirm', 'RegisterController@confirm');

$router->get('login', 'LoginController@login');
$router->post('login', 'LoginController@store');

/**
 * Authenticated user routes
 */

