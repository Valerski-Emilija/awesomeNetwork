<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TermsOfUseController extends Controller
{
    /**
     * @Route("/terms-of-use", name="terms_of_use")
     */
    public function index()
    {
      return $this->render('terms.html.twig');
    }
}
