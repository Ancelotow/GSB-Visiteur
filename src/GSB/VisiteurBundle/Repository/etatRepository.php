<?php

namespace GSB\VisiteurBundle\Repository;

/**
 * etatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class etatRepository extends \Doctrine\ORM\EntityRepository
{

    public function allEtat()
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('e')
            ->from('GSBVisiteurBundle:etat', 'e')
            ->orderBy('e.libelle');
        $query = $qb->getQuery();
        $result = $query->getResult();
        return $result;
    }

}
