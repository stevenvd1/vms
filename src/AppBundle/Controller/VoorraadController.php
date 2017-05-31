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
use AppBundle\Form\Type\MinimumVoorraadFormulier;

class VoorraadController extends Controller
{
  //dit command geeft je de mogenlijkheid om een artikel te zoeken.
  /**
      * @Route("/voorraad/zoek", name="zoekartikel")
      */


  public function zoekartikel(Request $request){

    $data = $request->request->get('artikelnummer');


    $em = $this->getDoctrine()->getManager();
    $query = $em->createQuery(
     'SELECT a FROM artikel a
     WHERE a.artikelnummer = :data')
    ->setParameter('data',$data);


  $res = $query->getResult();

  return $this->render('zoek.html.twig', array(
     'res' => $res));
  }

}
