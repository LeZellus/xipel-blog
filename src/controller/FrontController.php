<?php

namespace App\src\controller;

class FrontController extends Controller
{
	public function home()
	{
		return $this->view->render('home');
	}

	//Function to register member with validation
	public function register($post)
	{
		if ($post->get('submit')) {

			$errors = $this->validation->validate($post, 'User');

			if (!$errors) {
				$this->userDAO->register($post);
				$this->session->set('register', 'Votre inscription a bien été effectuée');
				header('Location: ../public/index.php');
				exit;
			}
			return  $this->view->render('register', [
				'post' => $post,
				'errors' => $errors
			]);
		}
		return $this->view->render('register');
	}

	//Function to login
	public function login($post)
	{
		if ($post->get('submit')) {
			$result = $this->userDAO->login($post);

			if ($result && $result['isPasswordValid']) {
				$this->session->set('login', 'Content de vous revoir');
				$this->session->set('id', $result['result']['id']);
				$this->session->set('pseudo', $post->get('pseudo'));
				$this->session->set('role', $result['result']['name']);
				header('Location: ../public/index.php');
				exit;
			} else {
				$this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
				return $this->view->render('login', [
					'post' => $post
				]);
			}
		}
		return $this->view->render('login');
	}
}
