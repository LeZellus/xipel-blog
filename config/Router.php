<?php

namespace App\src\controller;

class FrontController
{

  public function __construct()
  {
  }

  public function home()
  {
    require '../templates/home.php';
  }
}
