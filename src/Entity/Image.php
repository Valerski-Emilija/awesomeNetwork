<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */

    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */

    private $title;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank
     * @Assert\Image(
     *      maxWidth = 400,
     *      maxHeight = 400
     * )
     */
     private $path;

     /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="image")
     * @ORM\JoinColumn(nullable=true)
     */

     private $user;

     public function setTitle($title)
      {
          $this->title = $title;
          return $this;
      }

     public function getTitle()
      {
         return $this->title;
      }

    public function setPath($path)
     {
         $this->path = $path;
         return $this;
     }

    public function getPath()
     {
        return $this->path;
     }

   public function setUser(User $user)
     {
        $this->user = $user;
     }

     public function getUser(): User
       {
           return $this->user;
       }

}
