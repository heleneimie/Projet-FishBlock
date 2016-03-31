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
        $actFirstames = ["Brian","Robert", "Angela","Raoul", "Emilia","Wilfried", "Kit", "Peter", "Jack", "Benedict", "Martin", "Toby", "Christopher", "Homer"];
        $actLastnames = ["Cranston","Duval", "Lansbury","Duschmoll", "Clarke","Kraspek", "Harington", "Dinklage", " Gleeson", "Cumberbatch", "Freeman", "Stephens", "Eccleston", "Simpson"];
        $pictures = ['BrianCranston.jpg', 'RobertDuval.jpg', 'AngelaLansbury.jpg', 'RaoulDuchmol.jpg', 'EmiliaClarke.jpg',
        'WilfriedKraspek.jpg', 'KitHarington.jpg', 'PeterDinklage.jpg', 'JackGleeson.jpg', 'Cumberbatch.jpg', 'Freeman.jpg',
         'Toby.jpg', "Christopher_Eccleston.jpg", "Homer.png"];
        $actRole = ["Walter White", "Wayne Kramer", "Jessica Fletcher", "Un poney", "Daenerys", "La Selle du poney", "Jon Snow", "Tyrion","Geoffray",
        "Sherlock","Dr Watson", "Cpt Flint", "Dr Who", "Homer Simpson"];
        for($i=0;$i<14;$i++){
            $actor = new Actor;
            $actor->setFirstname($actFirstames[$i])
                ->setLastname($actLastnames[$i])
                ->setRole($actRole[$i])
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
