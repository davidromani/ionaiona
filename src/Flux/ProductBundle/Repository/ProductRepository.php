<?php
namespace Flux\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{

    public function getSortedActiveItems()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxProductBundle:Product p WHERE p.isActive = 1 ORDER BY p.position ASC')
            ->getResult();
    }

    public function getSortedActiveItemsFromCategoryCode($code)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxProductBundle:Product p JOIN p.category c WHERE p.isActive = 1 AND c.code = :code ORDER BY p.position ASC')
            ->setParameter('code', $code)
            ->getResult();
    }

    public function getPrevActiveItemFromPositionAndCategory($pos, $category)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxProductBundle:Product p WHERE p.isActive = 1 AND p.position = :pos AND p.category = :category')
            ->setParameter('pos', $pos - 1)
            ->setParameter('category', $category)
            ->getSingleResult();
    }

    public function getNextActiveItemFromPositionAndCategory($pos, $category)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxProductBundle:Product p WHERE p.isActive = 1 AND p.position = :pos AND p.category = :category')
            ->setParameter('pos', $pos + 1)
            ->setParameter('category', $category)
            ->getSingleResult();
    }

}