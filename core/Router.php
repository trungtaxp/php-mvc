<?php

namespace app\core;

/**
 * @package app\core
 */

class Router
{
    public Request $request;
    protected array $routes = [];
 /*  co nghia la     'get'=> [
            '/' => callback,
            'contact' => callback
        ],
        post' => callback'
 */
    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
        //chu thich dong 12
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false)
        {
            echo "Not found ";
            exit;
        }
        echo call_user_func($callback);
        // call_user_func la goi lai ham noi khac.
        
    }
}