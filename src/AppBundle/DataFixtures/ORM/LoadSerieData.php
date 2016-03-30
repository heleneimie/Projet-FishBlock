<?php
// src/AppBundle/DataFixtures/ORM/LoadUserData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Serie;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadSerieData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $actors = $manager->getRepository('AppBundle:Actor')->findAll();
        $author = $manager->getRepository('AppBundle:User')->findOneBy(['username'=>'admin']);
        $summary = "Le résumé de votre super serie trop de la balle!";
        $posters = ['GOT.jpg', 'BreakingBad.jpg', 'MPP.jpg', 'LouisLaBrocante.png', 'HOC.jpg', 'DowntonAbbey.jpg'];

        $serie = new Serie;
        $serie->setTitle('Game Of Thrones')
            ->setSeason(1)
            ->setNote(4)
            ->setGenre('Romance')
            ->setSummary($summary)
            ->setActors($actors)
            ->setAuthor($author)
            ->setPoster($posters[0]);

        $manager->persist($serie);
        $manager->flush();

        $serie2 = new Serie;
        $serie2->setTitle('Breaking Bad')
            ->setSeason(5)
            ->setNote(7)
            ->setGenre('Drama')
            ->setSummary($summary)
            ->setActors($actors)
            ->setAuthor($author)
            ->setPoster($posters[1]);

        $manager->persist($serie2);
        $manager->flush();

        $serie3 = new Serie;
        $serie3->setTitle('Mon petit poney')
            ->setSeason(25)
            ->setNote(3)
            ->setGenre('Science Fiction')
            ->setSummary($summary)
            ->setActors($actors)
            ->setAuthor($author)
            ->setPoster($posters[2]);

        $manager->persist($serie3);
        $manager->flush();

        $serie4 = new Serie;
        $serie4->setTitle('Louis la Brocante')
            ->setSeason(46)
            ->setNote(9)
            ->setGenre('Horreur')
            ->setSummary($summary)
            ->setActors($actors)
            ->setAuthor($author)
            ->setPoster($posters[3]);

        $manager->persist($serie4);
        $manager->flush();

        $serie5 = new Serie;
        $serie5->setTitle('House of Cards')
            ->setSeason(4)
            ->setNote(7)
            ->setGenre('Comédie')
            ->setSummary($summary)
            ->setActors($actors)
            ->setAuthor($author)
            ->setPoster($posters[4]);

        $manager->persist($serie5);
        $manager->flush();

        $serie6 = new Serie;
        $serie6->setTitle('Downtown Abbey')
            ->setSeason(1)
            ->setNote(10)
            ->setGenre('Thriller')
            ->setSummary($summary)
            ->setActors($actors)
            ->setAuthor($author)
            ->setPoster($posters[5]);

        $manager->persist($serie6);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        // TODO: Implement getOrder() method.
    }
}
