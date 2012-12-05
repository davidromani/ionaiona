<?php

namespace IonaIona\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;
use IonaIona\PageBundle\Form\Store;
use IonaIona\PageBundle\Entity\StoreCustomer;
use IonaIona\PageBundle\Entity\StoreCustomerProduct;

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
            'fee_carrier' => $this->container->getParameter('fee_carrier'),
            'fee_iva' => $this->container->getParameter('fee_iva'),
        ));
    }

    public function step2Action()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $cistell = $session->get('cistell');
        $items = array();

        // Transforma el cistell (matriu de punters) amb objectes del tipus producte per enviar a la vista
        foreach ($cistell as $item) {
            $product = $em->getRepository('FluxProductBundle:Product')->find($item);
            if ($product) {
                array_push($items, $product);
            }
        }

        // Construye el formulario de contacto
        $storeCustomer = new StoreCustomer();
        $formulario = $this->createForm(new Store(), $storeCustomer);
        if ($this->getRequest()->isMethod('POST')) {
            $formulario->bind($this->getRequest());
            if ($formulario->isValid()) {
                // Logica para guardar el pedido, enviar notificacion
                // y registrar al cliente nuevo antes de cargar la vista del paso 3 de compra
                $customer = $em->getRepository('PageBundle:StoreCustomer')->findOneBy(array('email' => $storeCustomer->getEmail()));
                if ($customer) {
                    // El cliente NO es nuevo
                } else {
                    // El cliente es nuevo
                    $customer = new StoreCustomer();
                    $customer->setEmail($storeCustomer->getEmail());
                    $customer->setCreated(new \DateTime());
                }
                // Actualiza los campos del cliente
                $customer->setName($storeCustomer->getName());
                $customer->setAddress($storeCustomer->getAddress());
                $customer->setCity($storeCustomer->getCity());
                $customer->setPhone($storeCustomer->getPhone());
                $customer->setPostalCode($storeCustomer->getPostalCode());
                $customer->setState($storeCustomer->getState());
                $customer->setWantNewsletter($storeCustomer->getWantNewsletter());
                $customer->setUpdated(new \DateTime());
                $em->persist($customer);

                // Registra la compra realizada
                foreach ($items as $item) {
                    $compra = new StoreCustomerProduct();
                    $compra->setStoreCustomer($customer);
                    $compra->setProduct($item);
                    $compra->setCreated(new \DateTime());
                    $compra->setPrice($item->getPrice());
                    $em->persist($compra);
                }

                // Envia una notificacion de pedido nuevo
                $comment = $formulario->get('mensaje')->getData();
                $logger = $this->get('logger');
                $logger->debug('[step2] Valid POST form!');
                $logger->debug('[step2] StoreCustomer = '.$storeCustomer);
                $logger->debug('[step2] comment = '.$comment);
                $message = \Swift_Message::newInstance()
                    ->setSubject('Nova comanda web ionaiona.com')
                    ->setFrom(array('maria@ionaiona.com' => 'Botiga ionaiona.com'))
                    ->setTo(array('maria@ionaiona.com' => 'Maria Pons', 'david@flux.cat' => 'David Romaní', 'karmekiare@gmail.com' => 'Carme Pons'))
                    ->setBody($this->renderView('PageBundle:Emails:formulari.comanda.html.twig', array('customer' => $storeCustomer, 'comment' => $comment, 'items' => $items, 'fee_carrier' => $this->container->getParameter('fee_carrier'), 'fee_iva' => $this->container->getParameter('fee_iva'))), 'text/html')
                ;
                $this->get('mailer')->send($message);
                $em->flush();
                return $this->render('PageBundle:Botiga:step3.html.twig', array(
                    'items' => $items,
                    'cistell' => $cistell,
                    'fee_carrier' => $this->container->getParameter('fee_carrier'),
                    'fee_iva' => $this->container->getParameter('fee_iva'),
                    'form' => $formulario->createView(),
                ));
            }
        }

        return $this->render('PageBundle:Botiga:step2.html.twig', array(
            'items' => $items,
            'cistell' => $cistell,
            'fee_carrier' => $this->container->getParameter('fee_carrier'),
            'fee_iva' => $this->container->getParameter('fee_iva'),
            'form' => $formulario->createView(),
        ));
    }

    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $cistell = $session->get('cistell');
        $items = array();

        if (count($cistell) > 0) {
            $array2 = array($id);
            $cistell = array_diff($cistell, $array2); // WARNING: elimina tots els duplicats
            $session->set('cistell', $cistell); // guarda cistell en sessio
        }

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
            'fee_carrier' => $this->container->getParameter('fee_carrier'),
            'fee_iva' => $this->container->getParameter('fee_iva'),
        ));
    }

}
