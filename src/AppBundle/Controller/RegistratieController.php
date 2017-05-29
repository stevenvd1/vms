<?php
// src/AppBundle/Controller/RegistratieController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Member;
use AppBundle\Form\Type\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RegistratieController extends Controller
{

  /**
   * @Route("/register/", name="register")
   */
public function registerAction(Request $request)
{

    $member = new Member();

    $form = $this->createForm(RegisterType::class, $member, [

    ]);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $password= $this
                ->get('security.password_encoder')
                ->encodePassword(
                $member,
                $member->getPlainPassword());
        $member->setPassword($password);

        $em = $this->getDoctrine()->getManager();

        $em->persist($member);
        $em->flush();

        $this->addFlash('notice',
            'Your changes were saved!'
        );

        $this->redirectToRoute('homepage');

    }

    return $this->render('registration/register.html.twig', [
        'registration_form' => $form->createView(),
            ]);
          }

}

?>
