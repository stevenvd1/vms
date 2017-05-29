<?php
// src/AppBundle/Controller/RegistratieController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Member;
use AppBundle\Form\Type\MemberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MemberController extends Controller
{

  /**
   * @Route("/members/wijzig/{id}", name="memberwijzig")
   */
  public function wijzigMember($id, Request $request) {
  $bestaandeMember = $this->getDoctrine()->getRepository("AppBundle:Member")->find($id);
   $form = $this->createForm(MemberType::class, $bestaandeMember);
   $roles = $this->getParameter('security.role_hierarchy.roles');

   $form->handleRequest($request);
   if ($form->isSubmitted() && $form->isValid()) {
   $em = $this->getDoctrine()->getManager();
   $em->persist($bestaandeMember);
   $em->flush();
   return $this->redirect($this->generateurl("artikel_lijst"));
   }

   return new Response($this->render('security/wijzig.html.twig', array('form' => $form->createView())));


   }

}

?>
