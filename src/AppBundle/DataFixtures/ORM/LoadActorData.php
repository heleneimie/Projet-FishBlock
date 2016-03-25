<?php
// src/AppBundle/DataFixtures/ORM/LoadActorData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Actor;

class LoadActorData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $actFirstames = ["Brian","Robert","Raoul","Jean Louis","Wilfried"];
        $actLastnames = ["Cranston","Duval","Duschmoll","David","Kraspek"];

        for ($i=0;$i<5;$i++){
            $actor = new Actor;
            $actor->setFirstname($actFirstames[$i])
                ->setLastname($actLastnames[$i]);

            $manager->persist($actor);
            $manager->flush();
        }

    }
}