<?php

namespace app\controllers;

use app\core\Application;

/**
 * @package app\controllers
 */
 class SiteController
{

     public function home()
     {
        $params = [
            'name'=> "21312312"
        ];
        //truyen them tham so sau link de bat su kien 
         return Application::$app->router->rendrView('home', $params);
     }

    public function contact()
    {
        return Application::$app->router->rendrView('contact');
    }
    public function handleContact()
    {
        return Application::$app->router->rendrView('contact');
    }

}