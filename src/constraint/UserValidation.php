<?php

namespace App\src\constraint;

use App\config\Parameter;

class UserValidation extends Validation
{

    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value)
    {
        if ($name === 'firstName') {
            $error = $this->checkFirstName($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'lastName') {
            $error = $this->checkLastName($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'email') {
            $error = $this->checkEmail($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'pseudo') {
            $error = $this->checkPseudo($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'password') {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error)
    {
        if ($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkFirstName($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Prénom', $value);
        }
        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('Prénom', $value, 2);
        }
        if ($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('Prénom', $value, 255);
        }
    }

    private function checkLastName($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Nom', $value);
        }
        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('Nom', $value, 2);
        }
        if ($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('Nom', $value, 255);
        }
    }

    private function checkEmail($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Email', $value);
        }
        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('Email', $value, 2);
        }
        if ($this->constraint->haveArobase($name, $value)) {
            return $this->constraint->haveArobase('Email', $value, 2);
        }
    }

    private function checkPseudo($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Pseudo', $value);
        }
        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('Pseudo', $value, 2);
        }
        if ($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('Pseudo', $value, 255);
        }
    }

    private function checkPassword($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Mot de passe', $value);
        }
        if ($this->constraint->haveSpecialCharacter($name, $value)) {
            return $this->constraint->haveSpecialCharacter('Mot de passe', $value);
        }
    }
}
