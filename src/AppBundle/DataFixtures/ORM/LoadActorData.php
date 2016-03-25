<?php
// src/AppBundle/DataFixtures/ORM/LoadActorData.php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Serie;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Actor;
use DateTime;
//use Symfony\Component\Validator\Constraints\DateTime;

class LoadActorData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $actor = new Actor;
        $actor->setFirstname('Brian')
            ->setLastname('Cranston')
            ->setSerie(new Serie('Breaking Bad'));

        $manager->persist($actor);
        $manager->flush();
    }
}