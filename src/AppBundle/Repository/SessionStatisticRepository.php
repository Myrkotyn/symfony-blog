<?php

namespace App\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SessionStatisticRepository extends EntityRepository
{
    public function findUserByBrowser()
    {
        $qb = $this->createQueryBuilder('ss');

        $result = $qb->select('count(ss) counter, ss.browser')
            ->groupBy('ss.browser')
            ->getQuery()
            ->getResult();

        return $result;
    }
}