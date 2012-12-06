<?php
namespace Flux\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    public function getActiveItemsSortedByTitle()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM FluxBlogBundle:Category c WHERE c.isActive = 1 ORDER BY c.title ASC')
            ->getResult();
    }
}