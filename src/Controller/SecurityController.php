<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
      $lastUsername = $authUtils->getLastUsername();
      $error = $authUtils->getLastAuthenticationError();

    return $this->render('user/login.html.twig', array(
      'last_username' => $lastUsername,
      'error'         => $error,
      ));
    }

    /**
     * @Route("/home", name="home")
     */

    public function home()
    {
      $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
      $user = $this->getUser();
      $image = $user->getImage();

      return $this->render('user/dashbord.html.twig', ['user' => $user]);
    }

    /**
     * @Route("/logout", name="logout")
     */

    public function logout(Request $request)
    {
      
    }

}
