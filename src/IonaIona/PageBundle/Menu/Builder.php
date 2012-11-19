<?php
namespace IonaIona\PageBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('armari', array('route' => 'armari_ca'));
        /*$armari->addChild('balena', array('route' => 'balena_ca'));
        $armari->addChild('girafa', array('route' => 'girafa_ca'));
        $armari->addChild('mico', array('route' => 'mico_ca'));
        $armari->addChild('gos salsitxa', array('route' => 'gossalsitxa_ca'));*/
        $menu->addChild('taller', array('route' => 'taller_ca'));
        $menu->addChild('diari', array('route' => 'diari_ca'));

        return $menu;
    }

    public function armariMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('armari');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('balena', array('route' => 'balena_ca'));
        $menu->addChild('girafa', array('route' => 'girafa_ca'));
        $menu->addChild('mico', array('route' => 'mico_ca'));
        $menu->addChild('gos salsitxa', array('route' => 'gossalsitxa_ca'));

        return $menu;
    }
}