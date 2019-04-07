<?php

namespace GSB\VisiteurBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{

    public function getUnUser($id)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u')
            ->from('GSBVisiteurBundle:User', 'u')
            ->where('id = :id')
            ->setParameter('id', $id);
        $query = $qb->getQuery();
        $result = $query->getResult();
        return $result;
    }

}