<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../config/dev.php';
require '../vendor/autoload.php';

session_start();

$router = new AltoRouter();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new \App\config\Router(dirname(__DIR__) . '/templates');
$router
  ->get('/', 'home', 'App\Src\Controllers\FrontController@home')
  ->run();
