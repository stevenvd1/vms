<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Home;

class DefaultController extends Controller
{
  //dit command geeft je de mogenlijkheid om naar de homepage te gaan.
    /**
     * @Route("/", name="homepage")
     */
 public function homepage(Request $request)
     {

}
