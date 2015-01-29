<?php

namespace Site\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * AuthorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AuthorRepository extends EntityRepository
{
    
    /*
     * Search by keyword
     */
    public function searchAuthor($mot_cle)
    {
        $querybuilder = $this->createQueryBuilder('a');
        $querybuilder->where($querybuilder->expr()->like('a.name', ':mot_cle'))
                     ->orWhere($querybuilder->expr()->like('a.presentation', ':mot_cle'))
                     ->setParameter('mot_cle', '%' . $mot_cle . '%');

        $authors = $querybuilder->getQuery()->getResult();

        return $authors;
    }
    
    
}