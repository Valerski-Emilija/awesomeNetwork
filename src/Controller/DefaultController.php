<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends Controller
{
    /**
     * @Route("/default", name="default")
     */

    public function index()
    {
      $repository = $this->getDoctrine()->getRepository(User::class);
      $users = $repository->findBy(array(), array('id' => 'DESC'),3);
    ;

      return $this->render('startpage.html.twig', ['users' => $users]);
    }
}
