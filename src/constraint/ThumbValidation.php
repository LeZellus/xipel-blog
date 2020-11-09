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
    } elseif ($name === 'type') {
      $error = $this->checkType($name, $value);
      $this->addError($name, $error);
    } elseif ($name === 'size') {
      $error = $this->checkSize($name, $value);
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
      return $this->constraint->haveSpace("image", $value);
    }
  }

  private function checkSize($name, $value)
  {
    if ($this->constraint->minSize($name, $value)) {
      return $this->constraint->minSize("taille", $value);
    }
    if ($this->constraint->maxSize($name, $value)) {
      return $this->constraint->maxSize("taille", $value);
    }
  }

  private function checkType($name, $value)
  {
    if ($this->constraint->haveExt($name, $value)) {
      return $this->constraint->haveExt("fichier", $value);
    }
  }
}
