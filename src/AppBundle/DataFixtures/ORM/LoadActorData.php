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
        $actFirstames = ["Brian","Robert","Raoul","Jean Louis","Wilfried"];
        $actLastnames = ["Cranston","Duval","Duschmoll","David","Kraspek"];

        for ($i=0;$i<5;$i++){
            $actor = new Actor;
            $actor->setFirstname($actFirstames[$i])
                ->setLastname($actLastnames[$i])
                ->setRole("Un poney");

            $manager->persist($actor);
            $manager->flush();
        }

    }
    public function getOrder()
    {
        return 2;
    }
}