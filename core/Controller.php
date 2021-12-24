<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->router->rendrView($view, $params);
    }
    // rut gon duong dan trong sitecontroller
}