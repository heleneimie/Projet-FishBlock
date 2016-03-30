<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $picture = ['adminAvatar.png', 'PhotoProfilHomme.jpg', 'PhotoProfilFemme.jpg'];

        $user = new User();
        $user->setUsername('admin')
            ->setEmail('admin@admin.fr')
            ->setPicture($picture[0]);
//        $user->setSalt(md5(uniqid()));

        // the 'security.password_encoder' service requires Symfony 2.6 or higher
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, 'password');
        $user->setPassword($password)
            ->setEnabled(true);

        $manager->persist($user);
        $manager->flush();

        $user1 = new User();
        $user1->setUsername('jeremy')
            ->setEmail('jeremy@jeremy.fr')
            ->setLogin('jeremimie')
            ->setPicture($picture[1]);
//        $user->setSalt(md5(uniqid()));

        // the 'security.password_encoder' service requires Symfony 2.6 or higher
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user1, 'password');
        $user1->setPassword($password)
            ->setEnabled(true);

        $manager->persist($user1);
        $manager->flush();

        $user2 = new User();
        $user2->setUsername('helene')
            ->setEmail('helene@helene.fr')
            ->setLogin('helemimie')
            ->setPicture($picture[2]);
//        $user->setSalt(md5(uniqid()));

        // the 'security.password_encoder' service requires Symfony 2.6 or higher
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user2, 'password');
        $user2->setPassword($password)
            ->setEnabled(true);

        $manager->persist($user2);
        $manager->flush();

        $user3 = new User();
        $user3->setUsername('clement')
            ->setEmail('clement@clement.fr')
            ->setLogin('clemimie')
            ->setPicture($picture[1]);
//        $user->setSalt(md5(uniqid()));

        // the 'security.password_encoder' service requires Symfony 2.6 or higher
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user3, 'password');
        $user3->setPassword($password)
            ->setEnabled(true);

        $manager->persist($user3);
        $manager->flush();

        $user4 = new User();
        $user4->setUsername('jonathan')
            ->setEmail('jonathan@jonathan.fr')
            ->setLogin('mimiejo')
            ->setPicture($picture[1]);
//        $user->setSalt(md5(uniqid()));

        // the 'security.password_encoder' service requires Symfony 2.6 or higher
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user4, 'password');
        $user4->setPassword($password)
            ->setEnabled(true);

        $manager->persist($user4);
        $manager->flush();
    }

    public function getOrder(){

        return 0;
    }
}