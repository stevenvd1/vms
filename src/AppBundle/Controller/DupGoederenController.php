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
  //dit command geeft je de mogenlijkheid om een lijst met bestelde goederen te zien.
  /**
   * @Route("/bestellingen", name="bestel_lijst")
   */
  public function alleBestellingen(Request $request)
  {

    $bestellingen = $this->getDoctrine()->getRepository('AppBundle:Bestelopdracht')->findAll();

    /**
    * @var $paginator \Knp\Component\Pager\Paginator
    */
    $paginator  = $this->get('knp_paginator');
    $result = $paginator->paginate(
        $bestellingen,
        $request->query->getInt('page', 1),
        $request->query->getInt('limit', 10)
      );

      return $this->render('goederen/bestellingen.html.twig', array(
        'bestellingen' => $result


      ));

  }
  //dit command geeft je de mogenlijkheid om een nieuwe bestelopdracht uit te voeren.
   /**
     * @Route("/goederen/bestelopdracht", name="bestelopdracht_nieuw")
     */
    public function nieuweBestelopdracht(Request $request)
    {
      $nieuweBestelopdracht = new Bestelopdracht();
      $form = $this->createForm(Bestelopdrachtformulier::class, $nieuweBestelopdracht);


    		$form->handleRequest($request);
    		if ($form->isSubmitted() && $form->isValid()) {
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($nieuweBestelopdracht);
    			$em->flush();

          $this->addFlash(
              'toegevoegd',
              'Bestelopdracht Toegevoegd'
            );

    			return $this->redirect($this->generateurl("bestel_lijst"));
    		}



    		return new Response($this->render('goederen/Bestelopdracht.html.twig', array('form' => $form->createView())));

    	}
      //dit command geeft je de mogenlijkheid om de ontvangen goederen in te zien.
      /**
     * @Route("/goederen/ontvangst", name="ontvangengoederen")
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

  	return $this->redirect($this->generateurl("artikel_lijst"));
    }
    return new Response($this->render('goederen/Ontvangengoederen.html.twig', array('form' => $form->createView())));
  }
}
