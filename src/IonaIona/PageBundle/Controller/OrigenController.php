<?php

namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class OrigenController extends Controller
{
    public function balenaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '004-002'));
        return $this->render('PageBundle:Origen:balena.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function patchdollsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '004-003'));
        return $this->render('PageBundle:Origen:patchdolls.html.twig', array(
            'pagina' => $pagina,
        ));
    }

}
