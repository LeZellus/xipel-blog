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
            header('Location: /index.php?route=login');
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
            header('Location: /index.php?route=profile');
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
            $articles = $this->articleDAO->getArticles();
            $comments = $this->commentDAO->getFlagComments();

            return $this->view->render('administration', [
                'users' => $users,
                'articles' => $articles,
                'comments' => $comments
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
                $this->session->set('add_article', 'Le nouvel article a bien été ajouté');
                $errors = $this->validation->validate($post, 'UpdatePassword');

                if (!$errors) {

                    $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
                    $this->session->set('update_password', 'Le mot de passe a été mis à jour');
                    header('Location: /index.php?route=profile');
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
        header('Location: /index.php');
    }

    /**
     * Function to delete user from ID
     */
    public function deleteUser($userId)
    {
        if ($this->checkAdmin()) {
            $this->userDAO->deleteUser($userId);
            $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
            header('Location: /index.php?route=administration');
        }
    }

    /**
     * Function to add article to website
     */
    public function addArticle($post, $files)
    {
        if ($this->checkAdmin()) {
            if ($post->get('submit')) {
                // var_dump($files['name']);
                // var_dump($files);
                $errors = $this->validation->validate($post, 'Article');
                $errorsThumb = $this->validation->validate($files, 'Thumb');
                if (!$errors && !$errorsThumb) {
                    $this->articleDAO->addArticle($post, $this->session->get('id'), $files['name']);
                    $this->session->set('create_article', 'Le nouvel article a bien été ajouté');
                    header('Location: /index.php?route=administration');
                }
                return $this->view->render('add_article', [
                    'post' => $post,
                    'errors' => $errors,
                    'errorsThumb' => $errorsThumb
                ]);
            }
            return $this->view->render('add_article');
        }
    }

    /**
     * Function to edit article by ID
     */
    public function editArticle($post, $articleId)
    {
        if ($this->checkAdmin()) {
            $article = $this->articleDAO->getArticle($articleId);
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Article');
                if (!$errors) {
                    $this->articleDAO->editArticle($post, $articleId, $this->session->get('id'));
                    $this->session->set('edit_article', 'L\' article a bien été modifié');
                    header('Location: /index.php?route=article&articleId=' . $articleId);
                }
                return $this->view->render('edit_article', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            $post->set('id', $article->getId());
            $post->set('title', $article->getTitle());
            $post->set('content', $article->getContent());
            $post->set('chapo', $article->getContent());
            $post->set('author', $article->getAuthor());
            $post->set('updatedAt', $article->getUpdatedAt());

            return $this->view->render('edit_article', [
                'post' => $post,
                'article' => $article
            ]);
        }
    }

    /**
     * Function to remove article from ID
     */
    public function removeArticle($articleId)
    {
        if ($this->checkAdmin()) {
            $this->articleDAO->removeArticle($articleId);
            $this->session->set('delete_article', 'L\'article a bien été supprimé');
            header('Location: /index.php?route=administration');
        }
    }

    /**
     * Function to flag comment from ID
     */
    public function flagComment($commentId)
    {
        $this->commentDAO->flagComment($commentId);
        $this->session->set('flag_comment', 'Le commentaire a été validé');
        header('Location: /index.php?route=administration');
    }

    /**
     * Function to remove comment from comment ID
     */
    public function removeComment($commentId)
    {
        $this->commentDAO->removeComment($commentId);
        $this->session->set('remove_comment', 'Le commentaire a été supprimé');
        header('Location: /index.php?route=administration');
    }
}
