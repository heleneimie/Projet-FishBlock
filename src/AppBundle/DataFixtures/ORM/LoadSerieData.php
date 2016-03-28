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
        $author = $manager->getRepository('AppBundle:User')->findOneBy(['username'=>'admin']);
        $summary = "Le résumé de votre super serie trop de la balle!";
        $serie = new Serie;
        $serie->setTitle('Arrow')
            ->setSeason(1)
            ->setNote(4)
            ->setGenre('Romance')
            ->setSummary($summary)
            ->setActors($actors)
            ->setAuthor($author);
        $manager->persist($serie);
        $manager->flush();

        $serie2 = new Serie;
        $serie2->setTitle('Breaking Bad')
            ->setSeason(5)
            ->setNote(7)
            ->setGenre('Drama')
            ->setSummary($summary)
            ->setActors($actors)
            ->setAuthor($author);
        $manager->persist($serie2);
        $manager->flush();

        $serie3 = new Serie;
        $serie3->setTitle('Mon petit poney')
            ->setSeason(25)
            ->setNote(3)
            ->setGenre('Science Fiction')
            ->setSummary($summary)
            ->setActors($actors)
            ->setAuthor($author);
        $manager->persist($serie3);
        $manager->flush();

        $serie4 = new Serie;
        $serie4->setTitle('Louis la Brocante')
            ->setSeason(46)
            ->setNote(9)
            ->setGenre('Horreur')
            ->setSummary($summary)
            ->setActors($actors)
            ->setAuthor($author);
        $manager->persist($serie4);
        $manager->flush();
    }
}
