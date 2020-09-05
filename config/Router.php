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
      if ($route) {
        if ($route === 'article') {
          require '../templates/single.php';
        } elseif ($route === 'register') {
          $this->frontController->register($this->request->getPost());
        } elseif ($route === 'login') {
          $this->frontController->login($this->request->getPost());
        } else {
          $this->errorController->errorNotFound();
        }
      } else {
        $this->frontController->home();
      }
    } catch (Exception $e) {
      $this->errorController->errorServer();
    }
  }
}
