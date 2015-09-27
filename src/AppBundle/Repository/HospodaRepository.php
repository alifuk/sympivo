<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class HospodaRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Hospoda p ORDER BY p.jmeno ASC'
            )
            ->getResult();
    }
    
    public function findAllOrderedByRank()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Hospoda p ORDER BY p.celkem ASC'
            )
            ->getResult();
    }
    
    
    
}