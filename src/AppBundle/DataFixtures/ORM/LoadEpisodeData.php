<?php
// src/AppBundle/DataFixtures/ORM/LoadEpisodeData.php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Serie;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Episode;
use DateTime;
//use Symfony\Component\Validator\Constraints\DateTime;

class LoadEpisodeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $episode = new Episode;
        $episode->setTitle('Better Call Saul')
            ->setAirdate(new DateTime('06-04-2016'))
            ->setLength(48)
            ->setSeason(2)
            ->setSummary('Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Dolorum eligendi, est, explicabo fugit iste minus nemo officiis,
            pariatur praesentium quasi quos sequi soluta veritatis!
            Enim itaque molestiae repudiandae voluptas voluptatum!');

        $manager->persist($episode);
        $manager->flush();
    }
}