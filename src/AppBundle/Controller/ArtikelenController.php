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


  //dit comand geeft een overzicht van alle artikelen
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
          'artikelen' => $result,



        ));

    }
//dit command geeft je de mogenlijkheid om een nieuw artikel in te voeren
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
//dit command geeft je de mogenlijkheid om het artikelnummer te verwijderen
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
          //dit command geeft je de mogenlijkheid om het artikel te verwijderen
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
//dit command geeft je de mogenlijkheid om een artikel te wijzigen
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
//dit command geeft je de mogenlijkheid om het artikelnummer te wijzigen.
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
//dit command geeft je de mogenlijkheid om details over een artikel te zien
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

//dit command geeft je de mogenlijkheid om een artikelnummer op te zoeken.
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
  //dit command geeft je de mogenlijkheid om de minumum voorraad van een artikel in te zien.
  /**
* @Route("/artikel/minimumvoorraad", name="minimumvoorraadartikelen")
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

}

/**
* @Route("/zoek/zoekartikel", name="zoekartikel")
*/
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


  //dit command geeft je de mogenlijkheid omverwijderde artikeln terug te zien.
/**
 * @Route("/artikelen/verwijderd", name="verwijderde_artikelen")
 */
public function verwijderdeArtikelen(Request $request)
{

  $Verwijderd = $this->getDoctrine()->getRepository('AppBundle:Artikel')->findAll();

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
      'bestellingen' => $result
    ));

}
/**
 * @Route("/zoek/magazijnlocatie/", name="zoek")
 */
public function zoek(Request $request)
{
  $zoek = $this->getDoctrine()->getRepository('AppBundle:Artikel')->findall();

    return $this->render('artikel/magazijnlocatie.html.twig', array(
      'zoeken' => $zoek
));
}
/**
 * @Route("/zoek/magazijnlocatie/{artikelnr}", name="magazijnlocatie")
 */
 public function magazijnlocatie($artikelnr)
 {
   $artikel = $this->getDoctrine()->getRepository('AppBundle:Artikel')->find($artikelnr);

     return $this->render('artikel/LocatieOpvragen.html.twig', array(
       'artikel' => $artikel
));
}

/**
 * @Route("/zoek/voorraad/", name="zoekvoorraad")
 */
public function zoekvoorraad(Request $request)
{
  $zoekvoorraad = $this->getDoctrine()->getRepository('AppBundle:Artikel')->findall();

    return $this->render('artikel/Voorraad.html.twig', array(
      'zoeken' => $zoekvoorraad
));
}
/**
 * @Route("/zoek/voorraad/{artikelnr}", name="zoekvoorraadartikelnr")
 */
 public function zoekvoorraadartikelnr($artikelnr)
 {
   $artikel = $this->getDoctrine()->getRepository('AppBundle:Artikel')->find($artikelnr);

     return $this->render('artikel/VoorraadArtikel.html.twig', array(
       'artikel' => $artikel
));
}
}
