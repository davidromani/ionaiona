<?php

namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class InstruccionsController extends Controller
{
    public function privacitatAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '004-002'));
        return $this->render('PageBundle:Instruccions:privacitat.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function condicionsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '004-002'));
        return $this->render('PageBundle:Instruccions:condicions.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function creditsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '004-002'));
        return $this->render('PageBundle:Instruccions:credits.html.twig', array(
            'pagina' => $pagina,
        ));
    }
}
