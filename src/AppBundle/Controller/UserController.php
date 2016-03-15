<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/user/add", name="adduser")
     */
    public function addAction(Request $request)
    {
        $user = new User;
        $form = $this->createForm(UserType::class, $user);

        if ($form->handleRequest($request)->isValid()) {
            $user->setEnabled(true);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('AppBundle:User:add.html.twig', array(
        'form' => $form->createView()
        ));
    }

    /**
     * @Route("/user/update")
     */
    public function updateAction()
    {
        return $this->render('AppBundle:User:update.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/user/check")
     */
    public function checkUserAction()
    {
        return $this->render('AppBundle:User:check_user.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/user/remove")
     */
    public function removeAction()
    {
        return $this->render('AppBundle:User:remove.html.twig', array(
            // ...
        ));
    }

}
