<?php
namespace Flux\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    public function getAllPostsSortedByDateQuery()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxBlogBundle:Post p ORDER BY p.postDate DESC');
    }
}