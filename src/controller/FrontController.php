<?php

namespace App\src\controller;

class FrontController extends Controller
{
	/**
	 * Function to return all articles on page home
	 */
	public function home()
	{
		$articles = $this->articleDAO->getArticles();
		return $this->view->render('home', [
			'articles' => $articles
		]);
	}

	/**
	 * Function to register member with validation
	 */
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

	/**
	 * Function to login
	 */
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

	/**
	 * Function to display article by id
	 */
	public function article($articleId)
	{
		$article = $this->articleDAO->getArticle($articleId);
		return $this->view->render('single', [
			'article' => $article
		]);
	}

	/**
	 * Function to return and display all articles on page blog
	 */
	public function blog()
	{
		$articles = $this->articleDAO->getArticles();
		return $this->view->render('blog', [
			'articles' => $articles
		]);
	}
}
