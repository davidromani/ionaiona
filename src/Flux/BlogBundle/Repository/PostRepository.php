<?php
namespace Flux\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    public function getAllPostsSortedByDateQuery()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxBlogBundle:Post p WHERE p.isActive = 1 ORDER BY p.postDate DESC');
    }

    public function getPostsFromMonthAndYearSortedByDateQuery($month, $year)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxBlogBundle:Post p WHERE p.isActive = 1 AND p.postDate >= :inici AND p.postDate <= :fi ORDER BY p.postDate DESC');
        $query->setParameter('inici', date('Y-m-d', mktime(0, 0, 0, $month, 1, $year)));
        $query->setParameter('fi', date('Y-m-t', mktime(0, 0, 0, $month, 28, $year)));    // la opcion -t devuelve la cantidad de dias que tiene el mes dado
        return $query;
    }

    public function getPostsFromCategoryIdSortedByDateQuery($id)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT p FROM FluxBlogBundle:Post p JOIN p.flux_blog_post_categories c WHERE p.isActive = 1 AND c.id = :id ORDER BY p.postDate DESC');
        $query->setParameter('id', $id);
        return $query;
    }

    public function getArrayOfArchives()
    {
        $items = $this->getEntityManager()->createQuery('SELECT p FROM FluxBlogBundle:Post p WHERE p.isActive = 1 ORDER BY p.postDate DESC')->execute();
        $result = array();
        if (count($items) > 0) {
            $lastItem = $items[0]; array_push($result, array('hit' => $lastItem->getPostDate()));
            foreach ($items as $item) {
                if ($lastItem->getPostDate()->format('m') != $item->getPostDate()->format('m')) {
                    array_push($result, array('hit' => $item->getPostDate()));
                }
            }
        }
        return $result;
    }
}