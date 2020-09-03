<?php

namespace App\src\controller;

use App\src\model\View;

class FrontController extends Controller
{
  public function __construct()
  {
    $this->view =new View();
  }
  public function home()
  {
    return $this->view->render('home');
  }
}
