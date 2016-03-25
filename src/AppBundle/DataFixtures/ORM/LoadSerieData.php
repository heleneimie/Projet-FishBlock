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
        $actors = $manager->getRepository('AppBundle:Actor')->findAll();
        $summaries = $manager->getRepository('AppBundle:Post')->findAll();
        $serie = new Serie;
        $serie->setTitle('Arrow')
            ->setSeasons(1)
            ->setNote(4)
            ->setGenre('Romance')
            ->setSummary($summaries[0])
            ->setActors($actors);
        $manager->persist($serie);
        $manager->flush();

        $serie2 = new Serie;
        $serie2->setTitle('Breaking Bad')
            ->setSeasons(5)
            ->setNote(7)
            ->setGenre('Drama')
            ->setSummary($summaries[1])
            ->setActors($actors);
        $manager->persist($serie);
        $manager->flush();

        $serie3 = new Serie;
        $serie3->setTitle('Mon petit poney')
            ->setSeasons(25)
            ->setNote(3)
            ->setGenre('Science Fiction')
            ->setSummary($summaries[2])
            ->setActors($actors);
        $manager->persist($serie);
        $manager->flush();
    }
}