<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    //Function to return administration profile
    public function administration()
    {
        $users = $this->userDAO->getUsers();

        return $this->view->render('administration', [
            'users' => $users
        ]);
    }

    //Function to return profile view
    public function profile()
    {
        return $this->view->render('profile');
    }

    //Function to update user password
    public function updatePassword(Parameter $post)
    {
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

    //Function to logout
    public function logout()
    {
        $this->logoutOrDelete('logout');
    }

    //Function to delete current user
    public function deleteAccount()
    {
        $this->userDAO->deleteAccount($this->session->get('pseudo'));
        $this->logoutOrDelete('delete_account');
    }

    //Function to manage logout or delete 
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

    //Function to delete user
    public function deleteUser($userId)
    {
        $this->userDAO->deleteUser($userId);
        $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }
}
