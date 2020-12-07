<?php

require '../vendor/autoload.php';

define('DEBUG_TIME', microtime(true));

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new AltoRouter();

$router = new App\config\Router(dirname(__DIR__) . "/views");
$router
  ->get('/blog/[*:slug]-[i:id]', 'post/show', 'post')
  ->get('/', 'home', 'home', 'FrontController#home')
  ->get('/test', 'test', 'test')
  ->run();
