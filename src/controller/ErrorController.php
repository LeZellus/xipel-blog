<?php

namespace App\src\controller;

class ErrorController extends Controller
{
	/**
	 * Function to return error not found
	 */
	public function errorNotFound()
	{
		return $this->view->render('error_404');
	}

	/**
	 * Function to return error server
	 */
	public function errorServer()
	{
		return $this->view->render('error_500');
	}
}
