<?php

require '../config/dev.php';
require '../vendor/autoload.php';

session_start();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new \App\config\Router();
$router->run();
