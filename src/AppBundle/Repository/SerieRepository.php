<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SerieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SerieRepository extends EntityRepository
{
    public function findRecentSeries($max){

        $query = $this->getEntityManager()->createQueryBuilder();
        return $query->select('s')
            ->from('AppBundle:Serie','s')
            ->orderBy('s.date','DESC')
            ->setMaxResults($max)
            ->getQuery();

 

    }
}
