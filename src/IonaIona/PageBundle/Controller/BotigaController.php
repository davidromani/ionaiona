<?php

namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BotigaController extends Controller
{
    public function step1Action($id)
    {
        $em = $this->getDoctrine()->getManager();
        $newItem = $em->getRepository('FluxProductBundle:Product')->find($id);
        return $this->render('PageBundle:Botiga:step1.html.twig', array(
            'item' => $newItem,
        ));
    }

}
