<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Image;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserslistController extends Controller
{
    /**
     * @Route("/userslist", name="userslist")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();
        return $this->render('user/userslist.html.twig', ['users' => $users]);
    }

    /**
     * @Route("/userslist/{username}", name="user_show")
     */

     public function singleUser($username)
   {
        $user = $this->getDoctrine()
        ->getRepository(User::class)
        ->findOneBy(array('username' => $username));

        if (!$user) {
        throw $this->createNotFoundException(
            'No user found for username '.$username
        );
    }

    $image = $user->getImage();

    return $this->render('user/show.html.twig', ['user' => $user, 'image' => $image]);
   }
}
