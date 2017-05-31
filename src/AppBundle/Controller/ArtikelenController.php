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
	*@Route("/artikel/zoek/artikelnummer", name="artikel_zoek_artikelnummer")
	*/
	public function zoekArtikelOpNummer(Request $request, $twig) {
		$form = $this->createForm(ArtikelZoekArtikelnummerForm::class);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$artikelnr = $form["artikelnr"]->getData();
			$artikel = $this->getDoctrine()->getRepository('AppBundle:Artikel')->find($artikelnr);
			$artikelen = array($artikel);

			$twigFile = $twig . ".html.twig";
			return new Response($this->renderView($twigFile, array('artikelen' =>$artikelen)));
		}

		return new Response($this->renderView('form.html.twig', array('form' => $form->createView())));
	}
  /**
* @Route("/artikel/minimumvoorraad", name="minimumvoorraadartike  len")
*/
Public function minimumvoorraad(Request $request){
	$em = $this->getDoctrine()->getManager();
	$query = $em->createQuery(
    'SELECT a
    FROM AppBundle:Artikel a
    WHERE a.minVoorraad > a.voorraad'

);
$artikelen = $query->getResult();
return new Response($this->renderView('artikel/minimumvoorraad.html.twig', array('artikelen' => $artikelen)));

<<<<<<< HEAD
}
=======
public function zoekartikel(Request $request)
{
    $artikelnr =$request->get('artikelnr');

  $em = $this->getDoctrine()->getManager();
  if($artikelnr == null){
  $query = $em->createQuery(
   'SELECT a FROM AppBundle:Artikel');
 }
  else {
    $query = $em-> createQuery(
      'SELECT a
      FROM AppBundle:Artikel a
      WHERE a.artikelnr LIKE :input2'
    );
    $query->setParameter('input2', '%' . $artikelnr . '%');
  }
  $artikelen = $query ->getResult();
  return new response($this->render('zoek.html.twig',
    array ('artikelen' => $artikelen)));

  }


/**
 * @Route("/artikelen/verwijderd", name="verwijderde_artikelen")
 */
public function verwijderdeArtikelen(Request $request)
{

  $Verwijderd = $this->getDoctrine()->getRepository('AppBundle:Verwijderd')->findAll();

  /**
  * @var $paginator \Knp\Component\Pager\Paginator
  */
  $paginator  = $this->get('knp_paginator');
  $result = $paginator->paginate(
      $Verwijderd,
      $request->query->getInt('page', 1),
      $request->query->getInt('limit', 10)
    );

    return $this->render('artikel/verwijderd.html.twig', array(
      'verwijderd' => $result


    ));

}

>>>>>>> 7a892ccbcdc36b2a8daa4ed482348e5744128b12
}
