<?php

namespace App\config;

use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use Exception;

class Router
{
  private $frontController;
  private $errorController;
  private $request;

  public function __construct()
  {
    $this->request = new Request();
    $this->frontController = new FrontController();
    $this->errorController = new ErrorController();
  }

  public function run()
  {
    $route = $this->request->getGet()->get('route');
    try {
      if (isset($route)) {
        if ($route === 'article') {
          print_r('pas d\'article');
        }
        $this->errorController->errorNotFound();
      }
      $this->frontController->home();
    } catch (Exception $e) {
      $this->errorController->errorServer();
    }
  }
}
