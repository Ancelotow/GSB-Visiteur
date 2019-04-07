<?php

namespace GSB\VisiteurBundle\Repository;

/**
 * frais_forfaitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class frais_forfaitRepository extends \Doctrine\ORM\EntityRepository
{

    public function getFF()
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('ff')
            ->from('GSBVisiteurBundle:frais_forfait', 'ff')
            ->orderBy("ff.montant");
        $query = $qb->getQuery();
        $result = $query->getResult();
        return $result;
    }

}
