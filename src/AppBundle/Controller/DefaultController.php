<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
  //dit command geeft je de mogenlijkheid om naar de homepage te gaan.
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('home/homepage.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    //dit command geeft je de mogenlijkheid om naar het login scherm te gaan.
    /**
     * @Route("/logins/", name="login_lijst")
     */
    public function alleLogins()
    {

      $username = 'username';
      $password = 'password';
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Users');


      $user = $repository->findOneBy(array('userName'=>$username,'password'=>$password));
      if ($user){
        return $this->render('artikel/logins.html.twig', array('name' => $users-> getFirstName()));
}
else{
        return $this->render('artikel/logins.html.twig', array('name' => 'Login Failed'));
}

    }
}
