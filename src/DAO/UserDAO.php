<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;

class UserDAO extends DAO
{
    /**
     * @param $row
     * @return User
     * Function to build user
     */
    private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setFirstName($row['firstName']);
        $user->setLastName($row['lastName']);
        $user->setEmail($row['email']);
        $user->setPseudo($row['pseudo']);
        $user->setCreatedAt($row['createdAt']);
        $user->setRole($row['role_id']);
        return $user;
    }

    /**
     * @return array
     * Function to getUsers
     */
    public function getUsers()
    {
        $sql = 'SELECT user.id, user.firstName, user.lastName, user.email, user.pseudo, user.createdAt, user.role_id FROM user INNER JOIN role ON user.role_id = role.id ORDER BY user.id DESC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row) {
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

    /**
     * @param $userId
     * @return User
     * Function to getUsers
     */
    public function getUser($userId)
    {
        $sql = 'SELECT user.id, user.firstName, user.lastName, user.email, user.pseudo, user.password, user.createdAt, user.role_id FROM user WHERE user.id = ?';
        $result = $this->createQuery($sql, [$userId]);
        $user = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($user);
    }

    /**
     * @param Parameter $post
     * Register member
     */
    public function register(Parameter $post)
    {
        $sql = 'INSERT INTO user (pseudo, firstName, lastName,  email, password, createdAt, role_id) VALUES (?, ?, ?, ?, ?, NOW(), ?)';
        $this->createQuery($sql, [
            $post->get('pseudo'),
            $post->get('firstName'),
            $post->get('lastName'),
            $post->get('email'),
            password_hash($post->get('password'), PASSWORD_BCRYPT),
            1
        ]);
    }

    /**
     * @param Parameter $pseudo
     * @return array
     * Check if pseudo already exist (check pseudo)
     */
    public function checkDuplicatePseudo(Parameter $post)
    {
        $sql = 'SELECT user.id, user.role_id, user.password, role.name FROM user INNER JOIN role ON role.id = user.role_id WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();

        return $result;
    }

    /**
     * @param Parameter $post
     * @return array
     * Login request (check pseudo and password)
     */
    public function login(Parameter $post)
    {
        $sql = 'SELECT user.id, user.role_id, user.password, role.name FROM user INNER JOIN role ON role.id = user.role_id WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }

    /**
     * @param Parameter $post
     * @param $pseudo
     * Update existing password
     */
    public function updatePassword(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
    }

    /**
     * @param $pseudo
     * Remove current user
     */
    public function deleteAccount($pseudo)
    {
        $sql = 'DELETE FROM user WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }

    /**
     * @param $userId
     * Remove user account
     */
    public function deleteUser($userId)
    {
        $sql = 'DELETE FROM user WHERE id = ?';
        $this->createQuery($sql, [$userId]);
    }
}
