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
        echo '<pre>';
        var_dump($path);
        echo '</pre>';
        exit;
    }
}