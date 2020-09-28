<?php

namespace App\src\model;

class Comment
{
  /**
   * @var int
   */
  private $id;

  /**
   * @var string
   */
  private $pseudo;

  /**
   * @var string
   */
  private $content;

  /**
   * @var \DateTime
   */
  private $createdAt;

  /**********************************************************************/
  /*Comment ID Managamenent**********************************************/
  /**********************************************************************/

  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**********************************************************************/
  /*Comment pseudo Managamenent******************************************/
  /**********************************************************************/

  /**
   * @return string
   */
  public function getPseudo()
  {
    return $this->pseudo;
  }

  /**
   * @param string $pseudo
   */
  public function setPseudo($pseudo)
  {
    $this->pseudo = $pseudo;
  }

  /**********************************************************************/
  /*Comment Content Managamenent*****************************************/
  /**********************************************************************/

  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }

  /**
   * @param string $content
   */
  public function setContent($content)
  {
    $this->content = $content;
  }

  /**********************************************************************/
  /*Comment Date Managamenent********************************************/
  /**********************************************************************/

  /**
   * @return \DateTime
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * @param \DateTime $createdAt
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
}
