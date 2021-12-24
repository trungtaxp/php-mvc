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
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    // chuc nang la lay url de tra ve gia tri trong url
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
        // method bat su kien khi dia chi url trong request.
    }

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function getBody()
        // ham nay su ly du lieu trong from khi nguoi dung nhap
    {
        $boddy = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                //filter_var tach ky tu; FILTER_SANITIZE_SPECIAL_CHARS lọc HTML- thoát các ký tự đặc biệt
            }
        }
        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                //filter_var tach ky tu; FILTER_SANITIZE_SPECIAL_CHARS lọc HTML- thoát các ký tự đặc biệt
            }
        }
        return $body;
    }
}