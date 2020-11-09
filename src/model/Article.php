<?php

namespace App\src\model;

class Article
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $chapo;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $thumb;

    /**********************************************************************/
    /*Article ID Managamenent**********************************************/
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
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**********************************************************************/
    /*Article title Managamenent*******************************************/
    /**********************************************************************/

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**********************************************************************/
    /*Article Content Managamenent*****************************************/
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
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**********************************************************************/
    /*Article Author Managamenent******************************************/
    /**********************************************************************/

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    /**********************************************************************/
    /*Article Chapo Managamenent*******************************************/
    /**********************************************************************/

    /**
     * @return string
     */
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * @param string $chapo
     */
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    /**********************************************************************/
    /*Article Date Managamenent********************************************/
    /**********************************************************************/

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        $date = $this->updatedAt;
        $dt = new \DateTime($date);
        $dtFormat = str_replace(" ", "-", $dt->format('d-m-Y'));
        return $dtFormat;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**********************************************************************/
    /*Article UpdatedDate Managamenent*************************************/
    /**********************************************************************/

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    { 
        $date = $this->updatedAt;
        $dt = new \DateTime($date);

        return $dt->format('d-M-y');
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**********************************************************************/
    /*Article Thumb Managamenent*******************************************/
    /**********************************************************************/

    /**
     * @return string
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * @param string $thumb
     */
    public function setThumb(string $thumb)
    {
        $this->thumb = $thumb;
    }
}
