<?php

namespace App\config;

use App\src\controller\FrontController;
use Exception;

class Router
{
  private $frontController;

  public function __construct()
  {
    $this->frontController = new FrontController();
  }

  public function run()
  {
    try {
      if (isset($_GET['route'])) {
        if ($_GET['route'] === 'article') {
          print_r('pas d\'article pour le moment');
        } else {
          print_r('page inconnue');
        }
      } else {
        $this->frontController->home();
      }
    } catch (Exception $e) {
      print_r('Erreur');
    }
  }
}
