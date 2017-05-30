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
     * @Route("/artikelen/", name="artikel_lijst")
     */
    public function alleArtikelen(Request $request)
    {

      $artikelen = $this->getDoctrine()->getRepository('AppBundle:Artikel')->findAll();

      /**
      * @var $paginator \Knp\Component\Pager\Paginator
      */
      $paginator  = $this->get('knp_paginator');
      $result = $paginator->paginate(
          $artikelen,
          $request->query->getInt('page', 1),
          $request->query->getInt('limit', 10)
        );

        return $this->render('artikel/index.html.twig', array(
          'artikelen' => $result


        ));

    }

    /**
     * @Route("/artikelen/nieuw", name="artikel_nieuw")
     */
    public function nieuwArtikel(Request $request)
    {
      $nieuwArtikel = new Artikel();
      $form = $this->createForm(ArtikelFormulier::class, $nieuwArtikel);


    		$form->handleRequest($request);
    		if ($form->isSubmitted() && $form->isValid()) {
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($nieuwArtikel);
    			$em->flush();
    			return $this->redirect($this->generateurl("artikel_lijst"));
    		}


    		return new Response($this->render('artikel/nieuw.html.twig', array('form' => $form->createView())));

    	}

      /**
       * @Route("/artikelen/verwijder/{artikelnr}", name="artikel_verwijder")
       */
      public function verwijderArtikel($artikelnr, Request $request)
      {
      			$em = $this->getDoctrine()->getManager();
      			$artikel = $em->getRepository('AppBundle:Artikel')->find($artikelnr);

            $em->remove($artikel);
      			$em->flush();

            $this->addFlash(
              'notice',
              'Artikel Verwijderd'
            );
      			return $this->redirect($this->generateurl("artikel_lijst"));
      		}
          /**
           * @Route("/artikelen/verwijder/", name="verwijderart")
           */
          public function verwijder(Request $request)
          {
            $verwijder = $this->getDoctrine()->getRepository('AppBundle:Artikel')->findall();

              return $this->render('artikel/verwijderpagina.html.twig', array(
                'verwijderen' => $verwijder
          ));
          }

          /**
           * @Route("/artikelen/wijzig/", name="wijzigart")
           */
          public function wijzig(Request $request)
          {
            $wijzig = $this->getDoctrine()->getRepository('AppBundle:Artikel')->findall();

              return $this->render('artikel/wijzigpagina.html.twig', array(
                'wijzigen' => $wijzig
          ));
          }

    /**
     * @Route("/artikelen/wijzig/{artikelnr}", name="artikel_wijzig")
     */
    public function wijzigArtikel($artikelnr, Request $request) {
    $bestaandeArtikel = $this->getDoctrine()->getRepository("AppBundle:Artikel")->find($artikelnr);
     $form = $this->createForm(ArtikelWijzigFormulier::class, $bestaandeArtikel);

     $form->handleRequest($request);
     if ($form->isSubmitted() && $form->isValid()) {
     $em = $this->getDoctrine()->getManager();
     $em->persist($bestaandeArtikel);
     $em->flush();
     return $this->redirect($this->generateurl("artikel_lijst"));
     }

     return new Response($this->render('artikel/wijzig.html.twig', array('form' => $form->createView())));


     }

    /**
     * @Route("/artikelen/detailles/{artikelnr}", name="artikel_detailles")
     */
    public function detaillesArtikel($artikelnr)
    {
      $artikel = $this->getDoctrine()->getRepository('AppBundle:Artikel')->find($artikelnr);

        return $this->render('artikel/detailles.html.twig', array(
          'artikel' => $artikel
));
}

/**
    * @Route("/artikelen/zoek", name="artikel_zoek")
    */


public function searchAction(Request $request){

  $data = $request->request->get('search');


  $em = $this->getDoctrine()->getManager();
  $query = $em->createQuery(
   'SELECT p FROM artikel:Suplier p
   WHERE p.name LIKE :data')
  ->setParameter('data',$data);


$res = $query->getResult();

return $this->render('FooTransBundle:Default:search.html.twig', array(
   'res' => $res));
}

}
