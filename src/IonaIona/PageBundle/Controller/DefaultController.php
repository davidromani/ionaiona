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
        return $this->render('PageBundle:Default:home.html.twig', array(
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
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-003'));
        return $this->render('PageBundle:Default:taller.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function diariAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        return $this->render('PageBundle:Default:diari.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function balenaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $balenes = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsFromCategoryCode('00A-00A');
        return $this->render('PageBundle:Armari:categoria.armari.html.twig', array(
            'pagina' => $pagina,
            'items' => $balenes,
        ));
    }

    public function girafaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $jirafes = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsFromCategoryCode('00A-00B');
        return $this->render('PageBundle:Armari:categoria.armari.html.twig', array(
            'pagina' => $pagina,
            'items' => $jirafes,
        ));
    }

    public function micoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $micos = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsFromCategoryCode('00A-00C');
        return $this->render('PageBundle:Armari:categoria.armari.html.twig', array(
            'pagina' => $pagina,
            'items' => $micos,
        ));
    }

    public function gossalsitxaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        return $this->render('PageBundle:Armari:categoria.armari.html.twig', array(
            'pagina' => $pagina,
        ));
    }
}
