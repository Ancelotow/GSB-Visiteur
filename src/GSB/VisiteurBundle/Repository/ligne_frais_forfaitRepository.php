<?php

namespace GSB\VisiteurBundle\Repository;

use GSB\VisiteurBundle\Entity\fiche_frais;

/**
 * ligne_frais_forfaitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ligne_frais_forfaitRepository extends \Doctrine\ORM\EntityRepository
{

    public function getLFF($id)
    {
        $ss_qb = $this->_em->createQueryBuilder();
        $ss_qb->select('ff.id')
            ->from('GSBVisiteurBundle:fiche_frais', 'ff')
            ->where('ff.idVisiteur = :id');

        $qb = $this->_em->createQueryBuilder();
        $qb->select('lff')
            ->from('GSBVisiteurBundle:ligne_frais_forfait', 'lff')
            ->where($qb->expr()->in('lff.ficheFrais', $ss_qb->getDQL()))
            ->setParameter('id', $id);
        $query = $qb->getQuery();
        $result = $query->getResult();
        return $result;
    }

    public function getLFFSynth($visiteur, $mois)
    {
        $ss_qb = $this->_em->createQueryBuilder();
        $ss_qb->select('ff.id')
            ->from('GSBVisiteurBundle:fiche_frais', 'ff')
            ->where('ff.idVisiteur = :visiteur')
            ->andWhere('ff.mois = :mois');

        $qb = $this->_em->createQueryBuilder();
        $qb->select('lff')
            ->from('GSBVisiteurBundle:ligne_frais_forfait', 'lff')
            ->where($qb->expr()->in('lff.ficheFrais', $ss_qb->getDQL()))
            ->setParameter('visiteur', $visiteur)
            ->setParameter('mois', $mois);
        $query = $qb->getQuery();
        $result = $query->getResult();
        return $result;
    }

    public function getUnLFF($id)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('lff')
            ->from('GSBVisiteurBundle:ligne_frais_forfait', 'lff')
            ->where('lff.id = :id')
            ->setParameter('id', $id);
        $query = $qb->getQuery();
        $result = $query->getOneOrNullResult();
        return $result;
    }

}
