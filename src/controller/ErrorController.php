<?php

namespace App\src\controller;

class ErrorController
{
  public function errorNotFound()
  {
    require '../templates/errors/error_404.php';
  }

  public function errorServer()
  {
    require '../templates/errors/error_500.php';
  }
}
