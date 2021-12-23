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
         return Application::$app->router->rendrView('home');
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