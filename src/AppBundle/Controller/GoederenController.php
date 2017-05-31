<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Bestelopdracht;
use AppBundle\Entity\Artikel;
use AppBundle\Entity\Leverancier;
use AppBundle\Form\Type\Bestelopdrachtform;
use AppBundle\Form\Type\Verwerkbestelling;

class GoederenController extends Controller
{



   /**
     * @Route("/goederen/bestelopdracht", name="bestelopdracht_nieuw")
     */

   public function nieuweBestelling(Request $request) {
   $nieuweBestelling = new Bestelopdracht();
   $form = $this->createForm(Bestelopdrachtform::class, $nieuweBestelling);

   $form->handleRequest($request);
   if ($form->isSubmitted() && $form->isValid()) {
     $em = $this->getDoctrine()->getManager();
     $em->persist($nieuweBestelling);
     $em->flush();
     return $this->redirect($this->generateurl("bestellingen"));
   }


   return new Response($this->render('bestellingen/Bestelopdracht.html.twig', array('form' => $form->createView())));

 }

      /**
       * @Route("goederen/bestellingen", name="bestellingen")
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

          return $this->render('bestellingen/bestellingen.html.twig', array(
            'bestellingen' => $result


          ));

      }

      /**

       * @Route("/goederen/bestellingen/verwerk/{bestelordernummer}", name="bestel_verwerk")
       */
      public function verwerkBestelling($bestelordernummer, Request $request) {
      $bestaandeBestelling = $this->getDoctrine()->getRepository("AppBundle:Bestelling")->find($bestelordernummer);
       $form = $this->createForm(Verwerkbestelling::class, $bestaandeBestelling);

       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {
       $em = $this->getDoctrine()->getManager();
       $em->persist($bestaandeBestelling);
       $em->flush();
       return $this->redirect($this->generateurl("teontvangen"));
       }

       return new Response($this->render('bestellingen/verwerk.html.twig', array('form' => $form->createView())));


       }

       /**
        * @Route("goederen/bestellingen/te_ontvangen", name="teontvangen")
        */
       public function teOntvangen(Request $request)
       {

         $bestellingen = $this->getDoctrine()->getRepository('AppBundle:Bestelling')->findAll();

         /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
         $paginator  = $this->get('knp_paginator');
         $result = $paginator->paginate(
             $bestellingen,
             $request->query->getInt('page', 1),
             $request->query->getInt('limit', 10)
           );

           return $this->render('bestellingen/te_ontvangen.html.twig', array(
             'bestellingen' => $result


           ));

       }

       /**
        * @Route("goederen/bestellingen/ontvangen", name="ontvangen")
        */
       public function Ontvangen(Request $request)
       {

         $bestellingen = $this->getDoctrine()->getRepository('AppBundle:Bestelling')->findAll();

         /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
         $paginator  = $this->get('knp_paginator');
         $result = $paginator->paginate(
             $bestellingen,
             $request->query->getInt('page', 1),
             $request->query->getInt('limit', 10)
           );

           return $this->render('bestellingen/ontvangen.html.twig', array(
             'bestellingen' => $result


           ));

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
