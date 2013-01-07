<?php

namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;
use Flux\BlogBundle\Entity\Post;
use Flux\BlogBundle\Entity\Category;

class DiariController extends Controller
{
    public function postAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //$session = $this->getRequest()->getSession();
        $categories = $em->getRepository('FluxBlogBundle:Category')->getActiveItemsSortedByTitle();
        $post = $em->getRepository('FluxBlogBundle:Post')->find($id);
        $archives = $em->getRepository('FluxBlogBundle:Post')->getArrayOfArchives();
        return $this->render('PageBundle:Diari:post.html.twig', array(
            'categories' => $categories,
            'post' => $post,
            'archives' => $archives
        ));
    }

    public function arxiuAction($month, $year)
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $categories = $em->getRepository('FluxBlogBundle:Category')->getActiveItemsSortedByTitle();
        $postsQuery = $em->getRepository('FluxBlogBundle:Post')->getPostsFromMonthAndYearSortedByDateQuery($month, $year);
        $paginator = $this->get('knp_paginator');
        $posts = $paginator->paginate($postsQuery, $this->getRequest()->query->get('page', 1), 10 /*limit per page*/);
        $archives = $em->getRepository('FluxBlogBundle:Post')->getArrayOfArchives();
        return $this->render('PageBundle:Diari:arxiu.html.twig', array(
            'pagina' => $pagina,
            'categories' => $categories,
            'posts' => $posts,
            'archives' => $archives
        ));
    }

    public function categoriesAction($category, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $categories = $em->getRepository('FluxBlogBundle:Category')->getActiveItemsSortedByTitle();
        $postsQuery = $em->getRepository('FluxBlogBundle:Post')->getPostsFromCategoryIdSortedByDateQuery($id);
        $paginator = $this->get('knp_paginator');
        $posts = $paginator->paginate($postsQuery, $this->getRequest()->query->get('page', 1), 10 /*limit per page*/);
        $archives = $em->getRepository('FluxBlogBundle:Post')->getArrayOfArchives();
        return $this->render('PageBundle:Diari:categories.html.twig', array(
            'pagina' => $pagina,
            'categories' => $categories,
            'posts' => $posts,
            'archives' => $archives
        ));
    }
}
