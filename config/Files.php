<?php

namespace App\config;

class Files
{
  private $files;

  public function __construct($files)
  {
    $this->files = $files;
  }

  public function set($name, $value)
  {
    $_FILES[$name] = $value;
  }

  public function get($name)
  {
    if (isset($_FILES[$name])) {
      return $_FILES[$name];
    }
  }
}
