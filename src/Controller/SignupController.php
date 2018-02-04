<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignupType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SignupController extends Controller
{
    /**
     * @Route("/signup", name="signup")
     */

    public function signup(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
       $user = new User();

       $form = $this->createForm(SignupType::class, $user);

       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {

         $password = $passwordEncoder->encodePassword($user, $user->getPassword());
         $user->setPassword($password);

         $user = $form->getData();

         $entity = $this->getDoctrine()->getManager();
         $entity->persist($user);
         $entity->flush();

         $username = ucfirst($user->getUsername());

         return $this->render('account_created.html.twig', ['user' => $username]);

   }

       return $this->render('signup.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
