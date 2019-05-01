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
$router->get('dashboard', 'DashboardController@index');

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');