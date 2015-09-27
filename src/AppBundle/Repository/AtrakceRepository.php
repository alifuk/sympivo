<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AtrakceRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT a FROM AppBundle:Atrakce a ORDER BY a.jmeno ASC'
            )
            ->getResult();
    }
    
    
    
}