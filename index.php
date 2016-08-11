<?php

include('src/autoload.php');
include('src/config.php');

(new Db($user, $password, $host, $db));

$controllerName = (new Routing($routes))->getControllerName();
$controller = new $controllerName;

echo (new $controller)->execute();