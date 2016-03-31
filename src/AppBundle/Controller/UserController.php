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

}