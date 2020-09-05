<?php

namespace App\src\controller;

class FrontController extends Controller
{
  public function home()
  {
    return $this->view->render('home');
  }
  public function register($post)
  {
    if ($post->get('submit')) {

      $errors = $this->validation->validate($post, 'User');

      if (!$errors) {
        $this->userDAO->register($post);
        $this->session->set('register', 'Votre inscription a bien été effectuée');
        header('Location: ../public/index.php');
      }
      return  $this->view->render('register', [
        'post' => $post,
        'errors' => $errors
      ]);
    }
    return $this->view->render('register');
  }
}
