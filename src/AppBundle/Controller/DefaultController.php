<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/index.html.twig',
            array('nom' => 'Hélène'
            )
        );
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {
        //$userManager = $this->get('fos_user.user_manager');
        $user = $this->getUser();
        $test = $user->getUsername();
        $test2 = $user->getId();
        $test3 = $user->getEmail();

        return $this->render('AppBundle:test.html.twig',
            array('name' => $test, 'id' => $test2, 'email' => $test3)
        );
    }
}

