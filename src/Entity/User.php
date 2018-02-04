<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80, unique= true)
     * @Assert\NotBlank()
     */

    private $username;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */

    private $firstname;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */

    private $surname;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */

    private $city;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */

    private $country;

    /**
     * @ORM\Column(type="string", length=80, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */

     private $email;

     /**
      * @ORM\Column(type="string", length=80, unique=true)
      * @Assert\NotBlank()
      */

      private $password;

      /**
       * @ORM\Column(type="text", nullable=true)
       */

       private $description;

      /**
       * @ORM\Column(name="is_active", type="boolean")
       */

       private $isActive;

       /**
        * @ORM\OneToOne(targetEntity="App\Entity\Image", mappedBy="user", cascade={"remove"})
        */

       private $image;


       public function __construct() {

         $this->isActive = true;


       }

       public function setUsername($username) {
          $this->username = $username;
       }

       public function setEmail($email)
       {
          $this->email = $email;
       }

       public function setPassword($password)
       {
          $this->password = $password;
       }

       public function setFirstname($firstname)
       {
          $this->firstname = $firstname;
       }

       public function setSurname($surname)
       {
          $this->surname = $surname;
       }

       public function setCity($city)
       {
          $this->city = $city;
       }

       public function setCountry($country)
       {
          $this->country = $country;
       }

       public function setDescription($description)
       {
          $this->description = $description;
       }

       public function getUsername()
       {
         return $this->username;
       }

       public function getEmail()
       {
         return $this->email;
       }

       public function getPassword()
       {
         return $this->password;
       }

       public function getId()
       {
         return $this->id;
       }

       public function getFirstname()
       {
          return $this->firstname;
       }

       public function getSurname()
       {
          return $this->surname;
       }

       public function getCity()
       {
          return $this->city;
       }

       public function getCountry()
       {
          return $this->country;
       }

       public function getDescription()
       {
         return $this->description;
       }

    /**
     * @return Image
     */

    public function getImage()
       {
           return $this->image;
       }


       public function getSalt()
       {
        return null;
       }

       public function getRoles()
       {
        return array('ROLE_USER');
       }

      public function eraseCredentials()
      {
      }

}
