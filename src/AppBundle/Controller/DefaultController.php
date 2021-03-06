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
        ($this->getUser())? $name=$this->getUser()->getUsername(): $name = "Invité";
        // replace this example code with whatever you need
        return $this->render('index.html.twig',
            array('name' => $name
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

    /**
     * @Route("/wip", name="wip_index")
     */
    public function workInProgressIndexAction(){
        return $this->render('workInProgress.html.twig');
    }
}

