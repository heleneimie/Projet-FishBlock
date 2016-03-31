<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Serie;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/followSerie/{id}", name="follow_serie")
     */
    public function followSerieAction(Serie $serie)
    {
        $user = $this->getUser();

        if ($user->addSeriesFollowed($serie)){
            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            $message = "Vous suivez maintenant ".$serie->getTitle();
            $this->addFlash('alert alert-success',$message);
        }else{
            $this->addFlash('alert alert-warning','Vous suivez deja cette série!');

        }

        return $this->redirectToRoute('serie_show', array(
            'id' => $serie->getId()
        ));
    }

    /**
     * @Route("/followUser/{id}", name="follow_user")
     */
    public function followUserAction(User $user)
    {
        $myself = $this->getUser();

        if ($myself->addMyFriend($user)){
            $em = $this->getDoctrine()->getManager();

            $em->persist($myself);
            $em->flush();

            $message = "Vous suivez maintenant ".$user->getUsername();
            $this->addFlash('alert alert-success',$message);
        }else{
            $this->addFlash('alert alert-warning','Vous suivez deja cette personne!');

        }

        return $this->redirectToRoute('homepage');
    }

    /**
     *
     * @Route("/userWall/{id}", name="user_show")
     */
    public function userWallAction(User $user)
    {
        return $this->render('wall.html.twig', ['user' => $user]);
    }
}
