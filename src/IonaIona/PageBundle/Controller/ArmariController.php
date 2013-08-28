<?php

namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Flux\ProductBundle\Entity\Product;
use Flux\ProductBundle\Entity\Category;

class ArmariController extends Controller
{
    public function itemsAction($nom, $id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var Product $item */
        $item = $em->getRepository('FluxProductBundle:Product')->find($id);
        /** @var Category $itemCategory */
        $itemCategory = $item->getCategory();
        $menuLevel2Position = $itemCategory->getPosition();
        $needsPrev = true;
        $needsNext = true;
        try {
            $prev = $em->getRepository('FluxProductBundle:Product')->getPrevActiveItemFromPositionAndCategory($item->getPosition(), $item->getCategory());
        } catch (\Doctrine\Orm\NoResultException $e) {
            $prev = null;
            $needsPrev = false;
        }
        try {
            $next = $em->getRepository('FluxProductBundle:Product')->getNextActiveItemFromPositionAndCategory($item->getPosition(), $item->getCategory());
        } catch (\Doctrine\Orm\NoResultException $e) {
            $next = null;
            $needsNext = false;
        }
        return $this->render('PageBundle:Armari:detalle.armari.html.twig', array(
            'prev' => $prev,
            'needsPrev' => $needsPrev,
            'item' => $item,
            'next' => $next,
            'needsNext' => $needsNext,
            'menuLevel2Position' => $menuLevel2Position,
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

    public function gossalsitxaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $gossos = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsFromCategoryCode('00A-00C');
        return $this->render('PageBundle:Armari:categoria.armari.html.twig', array(
            'pagina' => $pagina,
            'items' => $gossos,
        ));
    }

    public function pitetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $micos = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsFromCategoryCode('00A-00D');
        return $this->render('PageBundle:Armari:categoria.armari.html.twig', array(
            'pagina' => $pagina,
            'items' => $micos,
        ));
    }

    public function ocellAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $micos = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsFromCategoryCode('00A-00E');
        return $this->render('PageBundle:Armari:categoria.armari.html.twig', array(
            'pagina' => $pagina,
            'items' => $micos,
        ));
    }

    public function banderolaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $micos = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsFromCategoryCode('00A-00F');
        return $this->render('PageBundle:Armari:categoria.armari.html.twig', array(
            'pagina' => $pagina,
            'items' => $micos,
        ));
    }

    public function mobilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        $mobils = $em->getRepository('FluxProductBundle:Product')->getSortedActiveItemsFromCategoryCode('00A-00G');
        return $this->render('PageBundle:Armari:categoria.armari.html.twig', array(
            'pagina' => $pagina,
            'items' => $mobils,
        ));
    }
}
