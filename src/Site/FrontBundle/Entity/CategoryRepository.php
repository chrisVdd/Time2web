<?php

namespace Site\FrontBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    /**
    * Find all categories, and order by name ASC
    */
    public function findAll()
    {
        return $this->findBy(array('status' => 1), array('id' => 'ASC'));
    }
    
    public function selectAllCategory()
    {
        
        $query = $this->_em->createQueryBuilder(
                    'SELECT cat
                     FROM SiteFrontBundle:Category cat 
                     ORDER BY cat.name ASC'
                );
        
        return $query->getResult();
    }
    
}
