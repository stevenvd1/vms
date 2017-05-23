<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Home;

class DefaultController extends Controller
{
    /**
     * @Route("/home/", name="homepage")
     */
 public function homepage(Request $request) 
    {
      $home = $this->getDoctrine()->getRepository('AppBundle:Home')->findall();

        return $this->render('home/index.html.twig', array(
          'homepage' => $home
    ));
    }
}