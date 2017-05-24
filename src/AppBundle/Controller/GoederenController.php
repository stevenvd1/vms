<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\ArtikelFormulier;
use AppBundle\Form\Type\ArtikelWijzigFormulier;
use AppBundle\Form\Type\Bestelopdrachtformulier;
use AppBundle\Entity\Bestelopdracht;
use AppBundle\Form\Type\Ontvangengoederenformulier;
use AppBundle\Entity\Ontvangengoederen;

class GoederenController extends Controller
{

   /**
     * @Route("/goederen/bestelopdracht", name="bestelopdracht")
     */
    public function bestelopdracht(Request $request)
    {
      $bestelopdracht = new bestelopdracht();
      $form = $this->createForm(Bestelopdrachtformulier::class, $bestelopdracht);


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



    		return new Response($this->render('goederen/Bestelopdracht.html.twig', array('form' => $form->createView())));

    	}

      /**
     * @Route("/goederen/ontvangengoederen", name="ontvangengoederen")
     */
    public function ontvangengoederen(Request $request)
    {
      $ontvangengoederen = new ontvangengoederen();
      $form = $this->createForm(Ontvangengoederenformulier::class, $ontvangengoederen);


    		$form->handleRequest($request);
    		if ($form->isSubmitted() && $form->isValid()) {
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($ontvangengoederen);
    			$em->flush();
        }
  	return $this->redirect($this->generateurl("artikel_lijst"));
    }
}
