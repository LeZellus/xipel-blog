<?php

namespace App\config;

use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use Exception;

class Router
{
  private $frontController;
  private $errorController;

  public function __construct()
  {
    $this->frontController = new FrontController;
    $this->errorController = new ErrorController;
  }
  public function run()
  {
    try {
      if (isset($_GET['route'])) {
        if ($_GET['route'] === 'article') {
          print_r("Pas d'article");
        } else {
          print_r('page inconnue');
        }
      } else {
        $frontController = new FrontController();
        $frontController->home();
      }
    } catch (Exception $e) {
      print_r('Erreur');
    }
  }
}
