<?php

namespace App\src\DAO;

use App\config\Parameter;

class UserDAO extends DAO
{
    //Register member
    public function register(Parameter $post)
    {
        $sql = 'INSERT INTO user (pseudo, firstName, lastName,  email, password, createdAt) VALUES (?, ?, ?, ?, ?, NOW())';
        $this->createQuery($sql, [
            $post->get('pseudo'),
            $post->get('firstName'),
            $post->get('lastName'),
            $post->get('email'),
            password_hash($post->get('password'), PASSWORD_BCRYPT)
        ]);
    }

    //Login request (check pseudo and password)
    public function login(Parameter $post)
    {
        $sql = 'SELECT id, password FROM user WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }

    //Update existing password
    public function updatePassword(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
    }

    //Remove existing user
    public function deleteAccount($pseudo)
    {
        $sql = 'DELETE FROM user WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }
}
