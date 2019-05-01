<?php

use Philo\Blade\Blade;
use App\Core\{App, Session};

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    $views = [App::get('config')['rootPath']. '/app/views'];
    $cache = App::get('config')['rootPath'] . '/app/cache';

    $blade = new Blade($views, $cache);

    echo $blade->view()->make($name, $data)->render();

    Session::deleteFlashData();
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path, $data = [])
{
    Session::flash($data);

    $rootUrl = App::get('config')['rootUrl'];
    
    header("Location: ${$rootUrl}{$path}");
}

/**
 * Dump and stop execution of the script.
 */
function dd() 
{
    foreach(func_get_args() as $argument) {
        echo '<pre>';
        var_dump($argument);
    }
    
    die();
}

/**
 * Get validation errors from session.
 */

 function errors()
 {
     if (isset($_SESSION['flash_data']['errors']) && 
     count($_SESSION['flash_data']['errors']) > 0) {
            return $_SESSION['flash_data']['errors'];
     }
     
     return [];
 }

/**
 * Get old input for field.
*/
function old($name, $default_value = null)
{
    if (isset( $_SESSION['flash_data']['inputs'][$name])) {
        return $_SESSION['flash_data']['inputs'][$name];
    }

    return $default_value;
}

function status() 
{
    if (isset( $_SESSION['flash_data']['status'])) {
        return $_SESSION['flash_data']['status'];
    }

    return false;
}

/**
 * 
 */
function activation_url($token, $email)
{
    $config = App::get('config');
    return $config['schema'].$config['rootUrl']."/confirm?token={$token}&email={$email}";
}

/**
 * Returns auth object of the app.
 */
function auth()
{
    return App::get('auth');
}