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
        $summary = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad beatae consequatur deleniti deserunt
        dolor dolorem dolores dolorum error, inventore laborum molestias mollitia necessitatibus nobis,
         officiis repellendus saepe sapiente velit veniam.";
        $serie = new Serie;
        $serie->setTitle('Arrow')
            ->setNationality('US')
            ->setSeasons(1)
            ->setNote(4)
            ->setShowrunner('Un connard')
            ->setSummary($summary)
            ->setActors('Un gros con');

        $manager->persist($serie);
        $manager->flush();
    }
}