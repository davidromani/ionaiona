<?php

namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TallerController extends Controller
{
    public function historiaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '002-001'));
        return $this->render('PageBundle:Taller:historia.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function artesaniaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '002-002'));
        return $this->render('PageBundle:Taller:artesania.html.twig', array(
            'pagina' => $pagina,
        ));
    }

    public function proximitatAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pagina = $em->getRepository('FluxPageBundle:Page')->findOneBy(array('code' => '002-003'));
        return $this->render('PageBundle:Taller:proximitat.html.twig', array(
            'pagina' => $pagina,
        ));
    }
}
