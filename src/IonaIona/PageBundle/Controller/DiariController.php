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
        return $this->render('PageBundle:Diari:post.html.twig', array(
            'categories' => $categories,
            'post' => $post,
        ));
    }


}
