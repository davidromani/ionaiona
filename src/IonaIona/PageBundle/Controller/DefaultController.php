<?php

namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-001'));
        $lastProduct = $em->getRepository('FluxProductBundle:Product')->getLastActiveProductWithStock();
        return $this->render('PageBundle:Default:home.html.twig', array(
            'pagina' => $pagina,
            'lastProduct' => $lastProduct
        ));
    }

    public function origenAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '004-001'));
        return $this->render('PageBundle:Default:origen.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function armariAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-002'));
        return $this->render('PageBundle:Default:armari.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function tallerAction()
    {
        /*$em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '002-001'));
        return $this->render('PageBundle:Taller:historia.html.twig', array(
            'pagina' => $pagina,
        ));*/

        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '002-000'));
        return $this->render('PageBundle:Default:taller.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function diariAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $categories = $em->getRepository('FluxBlogBundle:Category')->getActiveItemsSortedByTitle();
        $postsQuery = $em->getRepository('FluxBlogBundle:Post')->getAllPostsSortedByDateQuery();
        $paginator = $this->get('knp_paginator');
        $posts = $paginator->paginate($postsQuery, $this->getRequest()->query->get('page', 1), 10 /*limit per page*/);
        $archives = $em->getRepository('FluxBlogBundle:Post')->getArrayOfArchives();
        return $this->render('PageBundle:Default:diari.html.twig', array(
            'pagina' => $pagina,
            'categories' => $categories,
            'posts' => $posts,
            'archives' => $archives
        ));
    }
}
