<?php
session_start();

require '../config/dev.php';
require '../vendor/autoload.php';

$router = new \App\config\Router();
$router->run();
