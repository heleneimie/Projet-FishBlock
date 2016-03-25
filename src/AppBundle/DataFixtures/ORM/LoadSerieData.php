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
        $summary = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad beatae consequatur deleniti deserunt
        dolor dolorem dolores dolorum error, inventore laborum molestias mollitia necessitatibus nobis,
         officiis repellendus saepe sapiente velit veniam.";
        $serie = new Serie;
        $serie->setTitle('Arrow')
            ->setSeasons(1)
            ->setNote(4)
            ->setGenre('Drama')
            ->setSummary($summary)
            ->setActors($actors);
        $manager->persist($serie);
        $manager->flush();
    }
}