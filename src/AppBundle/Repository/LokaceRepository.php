<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class LokaceRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT lok FROM AppBundle:Lokace lok ORDER BY lok.jmeno ASC'
            )
            ->getResult();
    }
    
    
    
    
}