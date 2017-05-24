<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\ArtikelFormulier;
use AppBundle\Form\Type\ArtikelWijzigFormulier;

class ArtikelenController extends Controller
{

   /**
     * @Route("/goederen/bestelopdracht", name="bestelopdracht")
     */
    public function bestelopdracht(Request $request)
    {
      $bestelopdracht = new bestelopdracht();
      $form = $this->createForm(BestelopdrachtFormulier::class, $bestelopdracht);


    		$form->handleRequest($request);
    		if ($form->isSubmitted() && $form->isValid()) {
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($bestelopdracht);
    			$em->flush();

          $this->addFlash(
              'toegevoegd',
              'Bestelopdracht Toegevoegd'
            );

    			return $this->redirect($this->generateurl("artikel_lijst"));
    		}



    		return new Response($this->render('goederen/bestelopdracht.html.twig', array('form' => $form->createView())));

    	}

}
