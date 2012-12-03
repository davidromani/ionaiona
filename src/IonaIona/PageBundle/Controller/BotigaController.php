<?php

namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;

class BotigaController extends Controller
{
    public function step1Action($id)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $cistell = $session->get('cistell');
        $items = array();

        if (count($cistell) > 0) {
            // Ja existeien items al cistell, no cal fer res
        } else {
            // No existeix cap item al cistell, per tant el crea a la sessio d'usuari i l'afegeix
            $cistell = array();
        }
        array_push($cistell, $id); // afegeix item al cistell. WARNING: no comprova duplicats
        $session->set('cistell', $cistell); // guarda cistell en sessio

        // Transforma el cistell (matriu de punters) amb objectes del tipus producte per enviar a la vista
        foreach ($cistell as $item) {
            $product = $em->getRepository('FluxProductBundle:Product')->find($item);
            if ($product) {
                array_push($items, $product);
            }
        }

        return $this->render('PageBundle:Botiga:step1.html.twig', array(
            'items' => $items,
            'cistell' => $cistell,
        ));
    }

}
