<?php

namespace App\src\controller;

use App\config\Request;
use App\src\model\View;
use App\src\DAO\UserDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\ArticleDAO;
use App\src\constraint\Validation;

abstract class Controller
{
	protected $articleDAO;
	protected $userDAO;
	protected $commentDAO;
	protected $view;
	private $request;
	protected $get;
	protected $post;
	protected $session;
	protected $validation;

	public function __construct()
	{
		$this->articleDAO = new ArticleDAO();
		$this->commentDAO = new CommentDAO();
		$this->view = new View();
		$this->request = new Request();
		$this->userDAO = new UserDAO();
		$this->validation = new Validation();
		$this->get = $this->request->getGet();
		$this->post = $this->request->getPost();
		$this->session = $this->request->getSession();
	}
}
