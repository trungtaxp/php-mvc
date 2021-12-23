<?php
require_once __DIR__.'/vendor/autoload.php';

use app\core\Application;

$app = new Application();

$app->route->get('/', function(){
    echo "Hello World";
});
$app->route->get('/contact', function(){
    echo "print contact";
});

$app->run();