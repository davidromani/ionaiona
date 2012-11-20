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
        /*$asociacion = $em->getRepository('ASBAEPageBundle:Page')->findOneBy(array('code' => '001-002'));
        $junta = $em->getRepository('ASBAEPageBundle:Page')->findOneBy(array('code' => '001-003'));
        $noticias = $em->getRepository('ASBAEEventsBundle:News')->findLast3ActiveAndOrderedByDate();*/
        return $this->render('PageBundle:Default:armari.html.twig', array(
            //'pagina' => $pagina,
            //'asociacion' => $asociacion,
            //'junta' => $junta,
            //'noticias' => $noticias
        ));
    }

    public function tallerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-003'));
        /*$asociacion = $em->getRepository('ASBAEPageBundle:Page')->findOneBy(array('code' => '001-002'));
        $junta = $em->getRepository('ASBAEPageBundle:Page')->findOneBy(array('code' => '001-003'));
        $noticias = $em->getRepository('ASBAEEventsBundle:News')->findLast3ActiveAndOrderedByDate();*/
        return $this->render('PageBundle:Default:taller.html.twig', array(
            //'pagina' => $pagina,
            //'asociacion' => $asociacion,
            //'junta' => $junta,
            //'noticias' => $noticias
        ));
    }

    public function diariAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-004'));
        /*$asociacion = $em->getRepository('ASBAEPageBundle:Page')->findOneBy(array('code' => '001-002'));
        $junta = $em->getRepository('ASBAEPageBundle:Page')->findOneBy(array('code' => '001-003'));
        $noticias = $em->getRepository('ASBAEEventsBundle:News')->findLast3ActiveAndOrderedByDate();*/
        return $this->render('PageBundle:Default:diari.html.twig', array(
            //'pagina' => $pagina,
            //'asociacion' => $asociacion,
            //'junta' => $junta,
            //'noticias' => $noticias
        ));
    }
}
