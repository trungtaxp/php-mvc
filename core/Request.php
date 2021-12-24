<?php

namespace app\core;

/**
 * @package app\core
 */
class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if($position === false)
        {
            return $path;
        }
        return substr($path, 0, $position);
    }
    // chuc nang la lay url de tra ve gia tri trong url
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
        // method bat su kien khi dia chi url trong request.
    }
    public function getBody()
    {

    }
}