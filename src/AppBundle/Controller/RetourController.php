<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Bestelopdracht;
use AppBundle\Form\Type\ArtikelFormulier;
use AppBundle\Form\Type\RetourFormulier;
use AppBundle\Entity\Artikel;
use AppBundle\Entity\Leverancier;
use AppBundle\Entity\Retour;
use AppBundle\Form\Type\Bestelopdrachtform;
use AppBundle\Form\Type\Verwerkbestelling;
use AppBundle\Form\Type\Ontvangenform;
use AppBundle\Form\Type\Afkeurenform;


class RetourController extends Controller
{

  /**
   * @Route("/retour/aanmaken", name="nieuweRetour")
   */

  public function nieuweRetour(Request $request)
  {
    $nieuweRetour = new Retour();
    $form = $this->createForm(RetourFormulier::class, $nieuweRetour);


      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($nieuweRetour);
        $em->flush();
        return $this->redirect($this->generateurl("Retourlijst"));
      }
   return new Response($this->render('artikel/NieuwRetour.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/retour/overzicht", name="Retourlijst")
     */
    public function Retourlijst(Request $request)
    {

      $Retour = $this->getDoctrine()->getRepository('AppBundle:Retour')->findAll();

      /**
      * @var $paginator \Knp\Component\Pager\Paginator
      */
      $paginator  = $this->get('knp_paginator');
      $result = $paginator->paginate(
          $Retour,
          $request->query->getInt('page', 1),
          $request->query->getInt('limit', 10)
        );



        return $this->render('artikel/RetourOverzicht.html.twig', array(
          'Retouren' => $result,



        ));

    }













}
