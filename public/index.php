<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

session_start();

define('DEBUG_TIME', microtime(true));

$router = new AltoRouter();

$router = new App\config\Router(dirname(__DIR__) . "/views");
$router
  ->get('/blog', 'post/index', 'blog')
  ->get('/test', 'test', 'test')
  ->run();
