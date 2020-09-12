<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    //Function to return administration profile
    public function administration()
    {
        return $this->view->render('administration');
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

    public function logout()
    {
        $this->logoutOrDelete('logout');
    }

    public function deleteAccount()
    {
        $this->userDAO->deleteAccount($this->session->get('pseudo'));
        $this->logoutOrDelete('delete_account');
    }

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
}
