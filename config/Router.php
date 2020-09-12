<?php

namespace App\config;

use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use App\src\controller\BackController;
use Exception;

class Router
{
  private $frontController;
  private $errorController;
  private $backController;
  private $request;

  public function __construct()
  {
    $this->request = new Request();
    $this->frontController = new FrontController();
    $this->errorController = new ErrorController();
    $this->backController = new BackController();
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
        } elseif ($route === 'profile') {
          $this->backController->profile();
        } elseif ($route === 'updatePassword') {
          $this->backController->updatePassword($this->request->getPost());
        } elseif ($route === 'logout') {
          $this->backController->logout();
        } elseif ($route === 'administration') {
          $this->backController->administration();
        } elseif ($route === 'deleteUser') {
          $this->backController->deleteUser($this->request->getGet()->get('userId'));
        } elseif ($route === 'deleteAccount') {
          $this->backController->deleteAccount();
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
