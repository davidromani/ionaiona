<?php

namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    public function homeAction()
    {
        /*$session = $this->getRequest()->getSession();
        if ($session->has('selectedMenuItem')) {
            if ($session->get("selectedMenuItem") != "inicio") {
                $session->set("selectedMenuItem", "inicio");
            }
        } else {
            $session->set("selectedMenuItem", "inicio");
        }*/
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '001-001'));
        /*$asociacion = $em->getRepository('ASBAEPageBundle:Page')->findOneBy(array('code' => '001-002'));
        $junta = $em->getRepository('ASBAEPageBundle:Page')->findOneBy(array('code' => '001-003'));
        $noticias = $em->getRepository('ASBAEEventsBundle:News')->findLast3ActiveAndOrderedByDate();*/
        return $this->render('PageBundle:Default:home.html.twig', array(
            //'pagina' => $pagina,
            //'asociacion' => $asociacion,
            //'junta' => $junta,
            //'noticias' => $noticias
        ));
    }

    public function armariAction()
    {
        /*$session = $this->getRequest()->getSession();
        if ($session->has('selectedMenuItem')) {
            if ($session->get("selectedMenuItem") != "inicio") {
                $session->set("selectedMenuItem", "inicio");
            }
        } else {
            $session->set("selectedMenuItem", "inicio");
        }*/
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
        /*$session = $this->getRequest()->getSession();
        if ($session->has('selectedMenuItem')) {
            if ($session->get("selectedMenuItem") != "inicio") {
                $session->set("selectedMenuItem", "inicio");
            }
        } else {
            $session->set("selectedMenuItem", "inicio");
        }*/
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
        /*$session = $this->getRequest()->getSession();
        if ($session->has('selectedMenuItem')) {
            if ($session->get("selectedMenuItem") != "inicio") {
                $session->set("selectedMenuItem", "inicio");
            }
        } else {
            $session->set("selectedMenuItem", "inicio");
        }*/
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
