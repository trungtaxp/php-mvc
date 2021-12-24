<?php

namespace app\core;

class Controller
{
    public function rendr($view, $params = [])
    {
        return Application::$app->router->rendrView($view, $params);
    }
    // rut gon duong dan trong sitecontroller
}