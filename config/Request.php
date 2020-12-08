<?php

namespace App\config;

class Request
{
  private $get;
  private $post;
  private $session;
  private $files;

  public function __construct()
  {
    $this->get = new Parameter($_GET);
    $this->post = new Parameter($_POST);
    $this->session = new Session($_SESSION);
    $this->files = new Files($_FILES);
  }

  /**
   * @return Parameter
   */
  public function getGet()
  {
    return $this->get;
  }

  /**
   * @return Parameter
   */
  public function getPost()
  {
    return $this->post;
  }

  /**
   * @return Session
   */
  public function getSession()
  {
    return $this->session;
  }

  /**
   * @return Parameter
   */
  public function getFiles()
  {
    return $this->files;
  }
}
