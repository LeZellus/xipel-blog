<?php

namespace App\src\controller;

use App\config\Request;
use App\src\model\View;
use App\src\DAO\UserDAO;
use App\src\constraint\Validation;

abstract class Controller
{
  protected $userDAO;
  protected $view;
  private $request;
  protected $get;
  protected $post;
  protected $session;
  protected $validation;

  public function __construct()
  {
    $this->view = new View();
    $this->request = new Request();
    $this->userDAO = new UserDAO();
    $this->validation = new Validation();
    $this->get = $this->request->getGet();
    $this->post = $this->request->getPost();
    $this->session = $this->request->getSession();
  }
}
