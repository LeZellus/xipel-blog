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
  private $contactController;
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
          $this->frontController->article($this->request->getGet()->get('articleId'));
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
          $this->backController->administration($this->request->getGet()->get('userId'));
        } elseif ($route === 'blog') {
          $this->frontController->blog();
        } elseif ($route === 'deleteUser') {
          $this->backController->deleteUser($this->request->getGet()->get('userId'));
        } elseif ($route === 'deleteAccount') {
          $this->backController->deleteAccount();
        } elseif ($route === 'addComment') {
          $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('articleId'));
        } elseif ($route === 'addArticle') {
          $this->backController->addArticle($this->request->getPost(), $this->request->getFiles()->get('thumb'));
        } elseif ($route === 'flagComment') {
          $this->backController->flagComment($this->request->getGet()->get('commentId'));
        } elseif ($route === 'removeComment') {
          $this->backController->removeComment($this->request->getGet()->get('commentId'));
        } elseif ($route === 'editArticle') {
          $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get('articleId'));
        } elseif ($route === 'removeArticle') {
          $this->backController->removeArticle($this->request->getGet()->get('articleId'));
        } elseif ($route === 'contact') {
          $this->contactController->contact($this->request->getPost());
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
