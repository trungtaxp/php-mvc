<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

/**
 * @package app\controllers
 */
 class SiteController extends Controller
{

     public function home()
     {
        $params = [
            'name'=> "to page"
        ];
        //truyen them tham so sau link de bat su kien
         return $this->rendr('home', $params);
     }

    public function contact()
    {
        return $this->rendr('contact');
    }
    public function handleContact()
    {
        var_dump($_POST);
        return "dang nhap thanh cong";
    }

}