<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
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
        $this->session->stop();
        $this->session->start();
        $this->session->set('logout', 'À bientôt');
        header('Location: ../public/index.php');
    }
}
