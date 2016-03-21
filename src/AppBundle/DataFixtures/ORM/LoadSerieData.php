<?php
// src/AppBundle/DataFixtures/ORM/LoadUserData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Serie;

class LoadSerieData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $serie = new Serie;
        $serie->setTitle('Arrow')
            ->setNationality('US')
            ->setSeasons(1)
            ->setNote(4)
            ->setShowrunner('Un connard')
            ->setSummary('Une série de merde')
            ->setActors('Un gros con');

        $manager->persist($serie);
        $manager->flush();
    }
}