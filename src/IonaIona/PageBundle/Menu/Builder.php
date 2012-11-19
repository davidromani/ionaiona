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

    public function main_ca_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('l\'armari', array('route' => 'armari_ca'));
        $menu->addChild('el taller', array('route' => 'taller_ca'));
        $menu->addChild('el diari', array('route' => 'diari_ca'));

        return $menu;
    }

    public function armari_ca_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('armari');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('balena', array('route' => 'balena_ca'));
        $menu->addChild('girafa', array('route' => 'girafa_ca'));
        $menu->addChild('mico', array('route' => 'mico_ca'));
        $menu->addChild('gos salsitxa', array('route' => 'gossalsitxa_ca'));

        return $menu;
    }

    public function main_es_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('armario', array('route' => 'armari_es'));
        $menu->addChild('taller', array('route' => 'taller_es'));
        $menu->addChild('diario', array('route' => 'diari_es'));

        return $menu;
    }

    public function armari_es_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('armari');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('ballena', array('route' => 'balena_es'));
        $menu->addChild('jirafa', array('route' => 'girafa_es'));
        $menu->addChild('mono', array('route' => 'mico_es'));
        $menu->addChild('perro salchicha', array('route' => 'gossalsitxa_es'));

        return $menu;
    }

    public function main_en_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('wardrobe', array('route' => 'armari_en'));
        $menu->addChild('workshop', array('route' => 'taller_en'));
        $menu->addChild('newspaper', array('route' => 'diari_en'));

        return $menu;
    }

    public function armari_en_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('armari');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('whale', array('route' => 'balena_en'));
        $menu->addChild('jiraffe', array('route' => 'girafa_en'));
        $menu->addChild('monkey', array('route' => 'mico_en'));
        $menu->addChild('dachshund', array('route' => 'gossalsitxa_en'));

        return $menu;
    }
}