<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    /**
     * Function to return if user is currently logged
     */
    private function checkLoggedIn()
    {
        if (!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?route=login');
        } else {
            return true;
        }
    }

    /**
     * Function to return if a user is an admin
     */
    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if (!($this->session->get('role') === 'admin')) {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: ../public/index.php?route=profile');
        } else {
            return true;
        }
    }

    /**
     * Function to return administration profile
     */
    public function administration()
    {
        if ($this->checkAdmin()) {
            $users = $this->userDAO->getUsers();

            return $this->view->render('administration', [
                'users' => $users
            ]);
        }
    }

    /**
     * Function to return profile view
     */
    public function profile()
    {
        if ($this->checkLoggedIn()) {
            return $this->view->render('profile');
        }
    }

    /**
     * Function to update user password
     */
    public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {

                $errors = $this->validation->validate($post, 'UpdatePassword');

                if (!$errors) {

                    $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
                    $this->session->set('update_password', 'Le mot de passe a été mis à jour');
                    header('Location: ../public/index.php?route=profile');
                }
                return  $this->view->render('update_password', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('update_password');
        }
    }

    /**
     * Function to logout
     */
    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->logoutOrDelete('logout');
        }
    }

    /**
     * Function to delete current user
     */
    public function deleteAccount()
    {
        if ($this->checkLoggedIn()) {
            $this->userDAO->deleteAccount($this->session->get('pseudo'));
            $this->logoutOrDelete('delete_account');
        }
    }

    /**
     * Function to manage logout or delete 
     */
    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if ($param === 'logout') {
            $this->session->set($param, 'À bientôt');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé');
        }
        header('Location: ../public/index.php');
    }

    /**
     * Function to delete user from ID
     */
    public function deleteUser($userId)
    {
        if ($this->checkAdmin()) {
            $this->userDAO->deleteUser($userId);
            $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
            header('Location: ../public/index.php?route=administration');
        }
    }

    /**
     * Function to add article to website
     */
    public function addArticle($post)
    {
        if ($this->checkAdmin()) {
            if ($post->get('submit')) {
                $this->articleDAO->addArticle($post);
                $this->session->set('create_article', 'Le nouvel article a bien été ajouté');
                header('Location: ../public/index.php?route=administration');

                return $this->view->render('add_article', [
                    'post' => $post
                ]);
            }
            return $this->view->render('add_article');
        }
    }

    /**
     * Function to edit article by ID
     */
    public function editArticle(Parameter $post, $articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        if ($post->get('submit')) {
            $this->articleDAO->editArticle($post, $articleId);
            $this->session->set('edit_article', 'L\' article a bien été modifié');
            header('Location: ../public/index.php');
        }
        return $this->view->render('edit_article', [
            'article' => $article
        ]);
    }
}
