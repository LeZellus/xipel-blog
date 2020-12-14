<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection;

$routes->add('accueil', new Route('/accueil', [
  '_controller' => 'App\src\Controller\FrontController::home'
]));
$routes->add('blog', new Route('/blog/{id}', [
  '_controller' => 'App\src\Controller\FrontController::article'
]));
$routes->add('about', new Route('/a-propos', [
  '_controller' => 'App\src\Controller\PageController::about'
]));

return $routes;
