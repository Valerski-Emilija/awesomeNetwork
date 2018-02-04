<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Image;
use App\Repository\UserRepository;
use App\Form\EditAccountType;
use App\Form\UploadImageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserActionsController extends Controller
{

 /**
  * @Route("/user/actions::editProfile", name="user_actions")
  */


  public function editProfile(Request $request)
  {
    $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
    $user = $this->getUser();

    $editForm = $this->createForm(EditAccountType::class, $user);

    $editForm->handleRequest($request);

  if ($editForm->isSubmitted() && $editForm->isValid()) {

    $user = $editForm->getData();

    $entity = $this->getDoctrine()->getManager();
    $entity->flush($user);

    $this->addFlash(
            'notice',
            'Your profile has been updated.'
        );

    return $this->redirectToRoute('home');

  }
 return $this->render('user/editProfile.html.twig', array(
         'editForm' => $editForm->createView(),
     ));
}

/**
 * @Route("/user/actions::uploadPicture", name="uploadPicture")
 */

public function uploadPicture(Request $request) {

  $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
  $user = $this->getUser();

  $image = new Image();

  $uploadForm = $this->createForm(UploadImageType::class, $image);
  $uploadForm->handleRequest($request);

    if($uploadForm->isSubmitted() && $uploadForm->isValid()) {

      $image = $uploadForm->getData();
      $file = $image->getPath();
      $fileName = md5(uniqid()).'.'.$file->guessExtension();

      $file->move(
                $this->getParameter('avatar_directory'),
                $fileName
            );

       $image->setPath($fileName);

       $image->setUser($user);

       $entity = $this->getDoctrine()->getManager();
       $entity->persist($user);
       $entity->persist($image);
       $entity->flush();

       $this->addFlash(
               'notice',
               'Your picture has been successfully uploaded.'
           );

      return $this->redirectToRoute('home');
    }

    return $this->render('user/uploadPicture.html.twig', array(
            'uploadForm' => $uploadForm->createView(),
        ));
}


   /**
    * @Route("/user/actions::deletePicture", name="deletePicture")
    */

   public function deletePicture(Request $request) {

     $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
     $user = $this->getUser();
     $image = $user->getImage();

     $file = $image->getPath();

     $fs = new Filesystem();

     $fs->remove(
               $this->getParameter('avatar_directory').'/'.$file
             );

     $entity = $this->getDoctrine()->getManager();
     $entity->remove($image);
     $entity->flush();

     $this->addFlash(
            'notice',
            'You have successfullly deleted your picture.'
        );

       return $this->redirectToRoute('home');

       }

       
 /**
  * @Route("/user/actions::deleteAccount", name="delete")
  */

  public function deleteAccount(Request $request)
  {
    $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
    $user = $this->getUser();

    $entity = $this->getDoctrine()->getManager();
    $entity->remove($user);
    $entity->flush();

    $this->get('security.token_storage')->setToken(null);
    $this->addFlash(
            'notice',
            'Your profile has been deleted.'
        );

    return $this->redirectToRoute('logout');
  }

}
