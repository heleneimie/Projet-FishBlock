<?php
// src/AppBundle/DataFixtures/ORM/LoadPostData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Post;

class LoadPostData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){

        $authors = $manager->getRepository('AppBundle:User')->findAll();
        $serie = $manager->getRepository('AppBundle:Serie')->findOneBy(['title' => 'Downtown Abbey']);
        for($i=0;$i<5;$i++){

            $post = new Post();
            $post->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad beatae consequatur deleniti deserunt
            dolor dolorem dolores dolorum error, inventore laborum molestias mollitia necessitatibus nobis,
            officiis repellendus saepe sapiente velit veniam.')
                ->setAuthor($authors[$i])
                ->setSerie($serie);

            $manager->persist($post);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 4;
    }
}