<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../config/dev.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpKernel;
use Symfony\Component\HttpFoundation\Session\Session;


require_once __DIR__ . '/../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$request = Request::createFromGlobals();

$routes = require __DIR__ . '/../config/Router.php';

$context = new RequestContext();
$context->fromRequest($request);

$session = new Session();


$controllerResolver = new HttpKernel\Controller\ControllerResolver();
$argumentResolver = new HttpKernel\Controller\ArgumentResolver();

$urlMatcher = new UrlMatcher($routes, $context);

try {
  $session->start();
  $result = ($urlMatcher->match($request->getPathInfo()));
  $request->attributes->add($result);

  $controller = $controllerResolver->getController($request);
  $arguments = $argumentResolver->getArguments($request, $controller);

  //Add trributes to request
  $response = call_user_func_array($controller, $arguments);
  $session->clear();
} catch (ResourceNotFoundException $e) {
  $response = new Response("La page n'existe pas : $e", 404);
} catch (Exception $e) {
  $response = new Response("Une erreur est survenue sur le serveur : $e", 500);
}

$response->send();
