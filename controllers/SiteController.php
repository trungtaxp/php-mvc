<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

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
         return $this->render('home', $params);
     }

    public function contact()
    {
        return $this->render('contact');
    }
    public function handleContact(Request $request)
    {
        $body = Application::$app->request->getBody();
        var_dump($body);
        return "dang nhap thanh cong";
    }

}