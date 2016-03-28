<?php
// src/AppBundle/DataFixtures/ORM/LoadPostData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Post;

class LoadPostData implements FixtureInterface
{
    public function load(ObjectManager $manager){

        $author = $manager->getRepository('AppBundle:User')->findOneBy(['username'=>'admin']);
        for($i=0;$i<11;$i++){

            $post = new Post();
            $post->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad beatae consequatur deleniti deserunt
            dolor dolorem dolores dolorum error, inventore laborum molestias mollitia necessitatibus nobis,
            officiis repellendus saepe sapiente velit veniam.')
                ->setAuthor($author);

            $manager->persist($post);
            $manager->flush();
        }


    }
}