<?php

namespace App\src\controller;

use App\src\model\View;

abstract class Controller
{
  protected $view;

  public function __construct()
  {
    $this->view = new View();
  }
}
