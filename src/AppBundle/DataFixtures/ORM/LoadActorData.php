<?php
// src/AppBundle/DataFixtures/ORM/LoadActorData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Actor;

class LoadActorData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function load(ObjectManager $manager)
    {
        $actFirstames = ["Brian","Robert", "Angela","Raoul", "Emilia","Wilfried"];
        $actLastnames = ["Cranston","Duval", "Lansbury","Duschmoll", "Clarke","Kraspek"];
        $pictures = ['BrianCranston.jpg', 'RobertDuval.jpg', 'AngelaLansbury.jpg', 'RaoulDuchmol.jpg', 'EmiliaClarke.jpg', 'WilfriedKraspek.jpg'];
        for ($i=0;$i<6;$i++){
            $actor = new Actor;
            $actor->setFirstname($actFirstames[$i])
                ->setLastname($actLastnames[$i])
                ->setRole("Un poney")
                ->setPicture($pictures[$i])
            ;

            $manager->persist($actor);
            $manager->flush();
        }

    }
    public function getOrder()
    {
        return 1;
    }
}