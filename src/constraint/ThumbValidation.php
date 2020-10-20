<?php

namespace App\src\constraint;

use App\config\Parameter;

class ThumbValidation extends Validation
{
  private $errors = [];
  private $constraint;

  public function __construct()
  {
    $this->constraint = new Constraint();
  }

  public function check(array $files)
  {
    foreach ($files as $key => $value) {
      $this->checkField($key, $value);
    }
    return $this->errors;
  }

  private function checkField($name, $value)
  {
    if ($name === 'name') {
      $error = $this->checkName($name, $value);
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

  private function checkName($name, $value)
  {
    if ($this->constraint->haveSpace($name, $value)) {
      return $this->constraint->haveSpace("thumb", $value);
    }
  }
}
