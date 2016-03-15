<?php

namespace SerieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/serie")
     */
    public function indexAction()
    {
        return $this->render('SerieBundle:Default:index.html.twig');
    }
}
