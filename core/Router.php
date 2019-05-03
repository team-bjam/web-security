<?php

namespace App\Core;

class Router
{
    /**
     * All registered routes.
     *
     * @var array
     */
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Load a user's routes file.
     *
     * @param string $file
     */
    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    /**
     * Register a GET route.
     *
     * @param string $uri
     * @param string $controller
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Register a POST route.
     *
     * @param string $uri
     * @param string $controller
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Load the requested URI's associated controller method.
     *
     * @param string $uri
     * @param string $requestType
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new Exception('No route defined for this URI.');
    }

    /**
     * Load and call the relevant controller action.
     *
     * @param string $controller
     * @param string $action
     */
    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        //only call the method in the controller, if all the middleware
        //as defined in the controller pass for the given method
        if($this->applyMiddleware($controller, $action) === true) {
            if (! method_exists($controller, $action)) {
                throw new Exception(
                    "{$controller} does not respond to the {$action} action."
                );
            }
    
            return $controller->$action();
        }

        
    }

    /**
     * Apply route middleware on the provided controller
     * @param $controller
     */
    protected function ApplyMiddleware($controller, $action)
    {   
        //in the beginning we think assume that the middleware passes
        //because we only care if it does not
        $middleware_passes = true;

        //check if the controller has any applied middleware, you can 
        //see the applied middleware in the __construct method
        //of the controller
        if (isset($controller->middleware)) {

            foreach($controller->middleware as $middleware_name => $middleware) {
                
                //if middleware is an array, then it means that it is being applied only
                //to some methods in the controller
                if(is_array($middleware)) {
                    //here the middleware has a set of methods in the controller that it applies to
                    //so we try to figure ouf if it is the method that we are calling
                    if(array_keys($middleware)[0] === 'only' && in_array($action, $middleware['only'])) {

                        //apply the middleware
                        $middleware = "App\\Middleware\\{$middleware_name}";
                        $middleware = new $middleware;

                        //if the middleware fails, we make a note of that, so that the router
                        //knows not to call the method in the controller
                        if ($middleware->handle() === false) {
                            $middleware_passes = false;
                        }
                    }
                } else {
                    $middleware = "App\\Middleware\\{$middleware}";
                    $middleware = new $middleware;
                    if ($middleware->handle() === false) {
                        $middleware_passes = false;
                    }
                }
            }
        }

        return $middleware_passes;
    }
}
