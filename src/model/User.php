<?php

namespace App\src\model;

class User
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
    private $firstName;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $email;

    /**
     * @var int
     */
    private $role;

    /**********************************************************************/
    /*User ID Managamenent*************************************************/
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
    /*User Pseudo Managamenent*********************************************/
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
    /*User FirstName Managamenent******************************************/
    /**********************************************************************/

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**********************************************************************/
    /*User LastName Managamenent*******************************************/
    /**********************************************************************/

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


    /**********************************************************************/
    /*User Password Managamenent*******************************************/
    /**********************************************************************/

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**********************************************************************/
    /*User Date Managamenent***********************************************/
    /**********************************************************************/

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        $date = $this->createdAt;
        $dt = new \DateTime($date);

        return $dt->format('d-m-Y');
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**********************************************************************/
    /*User Rôle Managamenent***********************************************/
    /**********************************************************************/

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**********************************************************************/
    /*User Rôle Managamenent***********************************************/
    /**********************************************************************/

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
}
