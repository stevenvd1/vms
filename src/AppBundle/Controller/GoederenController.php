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
use AppBundle\Form\Type\Ontvangenform;
use AppBundle\Form\Type\Afkeurenform;

class GoederenController extends Controller
{
  //dit command geeft je de mogenlijkheid om bestelde goederen te wijzigen.
  /**
   * @Route("/goederen/bestelling/wijzig/{id}", name="bestelling_wijzig")
   */
  public function wijzigBestelling($id, Request $request) {
  $bestaandeArtikel = $this->getDoctrine()->getRepository("AppBundle:Bestelopdracht")->find($id);
   $form = $this->createForm(Verwerkbestelling::class, $bestaandeArtikel);

   $form->handleRequest($request);
   if ($form->isSubmitted() && $form->isValid()) {
   $em = $this->getDoctrine()->getManager();
   $em->persist($bestaandeArtikel);
   $em->flush();
   return $this->redirect($this->generateurl("teontvangen"));
   }

   return new Response($this->render('bestellingen/verwerk.html.twig', array('form' => $form->createView())));


   }


   /**
    * @Route("/goederen/bestelling/verwerk/{id}", name="bestelling_verwerk")
    */
   public function verwerkBestelling($id, Request $request) {
   $bestaandeArtikel = $this->getDoctrine()->getRepository("AppBundle:Bestelopdracht")->find($id);
    $form = $this->createForm(Ontvangenform::class, $bestaandeArtikel);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
    $em = $this->getDoctrine()->getManager();
    $em->persist($bestaandeArtikel);
    $em->flush();
    return $this->redirect($this->generateurl("ontvangen"));
    }

    return new Response($this->render('bestellingen/verwerk.html.twig', array('form' => $form->createView())));


    }

    /**
     * @Route("/goederen/bestelling/afkeuren/{id}", name="bestelling_afkeuren")
     */
    public function afkeurenBestelling($id, Request $request) {
    $bestaandeArtikel = $this->getDoctrine()->getRepository("AppBundle:Bestelopdracht")->find($id);
     $form = $this->createForm(Afkeurenform::class, $bestaandeArtikel);

     $form->handleRequest($request);
     if ($form->isSubmitted() && $form->isValid()) {
     $em = $this->getDoctrine()->getManager();
     $em->persist($bestaandeArtikel);
     $em->flush();
     return $this->redirect($this->generateurl("ontvangen"));
     }

     return new Response($this->render('bestellingen/verwerk.html.twig', array('form' => $form->createView())));


     }


   //dit command geeft je de mogenlijkheid om een nieuwe bestelopdracht te doen.


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
 //dit command geeft je de mogenlijkheid om de bestellingen te zien.

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

      //dit command geeft je de mogenlijkheid om de te ontvangen goederen te zien.

       /**
        * @Route("goederen/bestellingen/te_ontvangen", name="teontvangen")
        */
       public function teOntvangen(Request $request)
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

           return $this->render('bestellingen/te_ontvangen.html.twig', array(
             'bestellingen' => $result


           ));

       }

       /**
        * @Route("goederen/bestellingen/afgekeurd", name="afgekeurd")
        */
       public function Afkeuren(Request $request)
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

           return $this->render('bestellingen/afgekeurd.html.twig', array(
             'bestellingen' => $result


           ));

       }

       /**
        * @Route("goederen/bestellingen/ontvangen", name="ontvangen")
        */
       public function Ontvangen(Request $request)
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

           return $this->render('bestellingen/ontvangen.html.twig', array(
             'bestellingen' => $result


           ));

       }
       //dit command geeft je de mogenlijkheid om de ontvangen goederen te zien.
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
