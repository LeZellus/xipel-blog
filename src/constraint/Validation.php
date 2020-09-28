<?php

namespace App\src\constraint;

class Validation
{
    public function validate($data, $name)
    {
        if ($name === 'User') {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }

        if ($name === 'UpdatePassword') {
            $updatePassword = new UpdatePasswordValidation();
            $errors = $updatePassword->check($data);
            return $errors;
        }

        if ($name === 'Article') {
            $articleValidation = new ArticleValidation();
            $errors = $articleValidation->check($data);
            return $errors;
        }
    }
}
