<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends EntityRepository
{
    public function findRecentPosts($max){

        $query = $this->getEntityManager()->createQueryBuilder();
        return $query->select('p')
            ->from('AppBundle:Post','p')
            ->orderBy('p.date','DESC')
            ->setMaxResults($max)
            ->getQuery();



    }
}
