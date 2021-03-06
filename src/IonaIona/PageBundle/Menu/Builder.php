<?php
namespace IonaIona\PageBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class Builder extends ContainerAware
{

    /// CATALA
    public function main_ca_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('l\'origen', array('route' => 'origen_ca'));
        $menu->addChild('l\'armari', array('route' => 'armari_ca'));
        $menu->addChild('el taller', array('route' => 'taller_ca'));
        $menu->addChild('el diari', array('route' => 'diari_ca'));
        $menu->setChildrenAttribute('id', 'menu-level-1');
        return $menu;
    }

    public function origen_ca_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('origen');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('la balena', array('route' => 'origen_la_balena_ca'));
        $menu->addChild('els patchdolls', array('route' => 'origen_els_patchdolls_ca'));
        $menu->setChildrenAttribute('id', 'menu-level-2');
        $menu->setChildrenAttribute('class', 'level2');
        return $menu;
    }

    public function armari_ca_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('armari');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('balena', array('route' => 'armari_balena_ca'));
        $menu->addChild('girafa', array('route' => 'armari_girafa_ca'));
        $menu->addChild('gos salsitxa', array('route' => 'armari_gossalsitxa_ca'));
        $menu->addChild('pitet', array('route' => 'armari_pitet_ca'));
        $menu->addChild('ocell', array('route' => 'armari_ocell_ca'));
        $menu->addChild('banderola', array('route' => 'armari_banderola_ca'));
        $menu->addChild('mòbil', array('route' => 'armari_mobil_ca'));
        $menu->setChildrenAttribute('id', 'menu-level-2');
        $menu->setChildrenAttribute('class', 'level2');
        return $menu;
    }

    public function taller_ca_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('taller');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('història', array('route' => 'taller_historia_ca'));
        $menu->addChild('artesania', array('route' => 'taller_artesania_ca'));
        $menu->addChild('proximitat', array('route' => 'taller_proximitat_ca'));
        $menu->setChildrenAttribute('id', 'menu-level-2');
        $menu->setChildrenAttribute('class', 'level2');
        return $menu;
    }

    // ESPANYOL
    public function main_es_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('origen', array('route' => 'origen_es'));
        $menu->addChild('armario', array('route' => 'armari_es'));
        $menu->addChild('taller', array('route' => 'taller_es'));
        $menu->addChild('diario', array('route' => 'diari_es'));
        $menu->setChildrenAttribute('id', 'menu-level-1');
        return $menu;
    }

    public function origen_es_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('origen');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('la ballena', array('route' => 'origen_la_balena_es'));
        $menu->addChild('los patchdolls', array('route' => 'origen_els_patchdolls_es'));
        $menu->setChildrenAttribute('id', 'menu-level-2');
        $menu->setChildrenAttribute('class', 'level2');
        return $menu;
    }

    public function armari_es_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('armari');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('ballena', array('route' => 'armari_balena_es'));
        $menu->addChild('jirafa', array('route' => 'armari_girafa_es'));
        $menu->addChild('perro salchicha', array('route' => 'armari_gossalsitxa_es'));
        $menu->addChild('babero', array('route' => 'armari_pitet_es'));
        $menu->addChild('pájaro', array('route' => 'armari_ocell_es'));
        $menu->addChild('banderola', array('route' => 'armari_banderola_es'));
        $menu->addChild('móvil', array('route' => 'armari_mobil_es'));
        $menu->setChildrenAttribute('id', 'menu-level-2');
        $menu->setChildrenAttribute('class', 'level2');
        return $menu;
    }

    public function taller_es_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('taller');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('historia', array('route' => 'taller_historia_es'));
        $menu->addChild('artesania', array('route' => 'taller_artesania_es'));
        $menu->addChild('proximidad', array('route' => 'taller_proximitat_es'));
        $menu->setChildrenAttribute('id', 'menu-level-2');
        $menu->setChildrenAttribute('class', 'level2');
        return $menu;
    }

    // ANGLES
    public function main_en_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('origin', array('route' => 'origen_en'));
        $menu->addChild('wardrobe', array('route' => 'armari_en'));
        $menu->addChild('workshop', array('route' => 'taller_en'));
        $menu->addChild('newspaper', array('route' => 'diari_en'));
        $menu->setChildrenAttribute('id', 'menu-level-1');
        return $menu;
    }

    public function origen_en_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('origen');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('the whale', array('route' => 'origen_la_balena_en'));
        $menu->addChild('the patchdolls', array('route' => 'origen_els_patchdolls_en'));
        $menu->setChildrenAttribute('id', 'menu-level-2');
        $menu->setChildrenAttribute('class', 'level2');
        return $menu;
    }

    public function armari_en_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('armari');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('whale', array('route' => 'armari_balena_en'));
        $menu->addChild('jiraffe', array('route' => 'armari_girafa_en'));
        $menu->addChild('dachshund', array('route' => 'armari_gossalsitxa_en'));
        $menu->addChild('bib', array('route' => 'armari_pitet_en'));
        $menu->addChild('bird', array('route' => 'armari_ocell_en'));
        $menu->addChild('flag', array('route' => 'armari_banderola_en'));
        $menu->addChild('mobile', array('route' => 'armari_mobil_en'));
        $menu->setChildrenAttribute('id', 'menu-level-2');
        $menu->setChildrenAttribute('class', 'level2');
        return $menu;
    }

    public function taller_en_Menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('taller');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->addChild('history', array('route' => 'taller_historia_en'));
        $menu->addChild('crafts', array('route' => 'taller_artesania_en'));
        $menu->addChild('proximity', array('route' => 'taller_proximitat_en'));
        $menu->setChildrenAttribute('id', 'menu-level-2');
        $menu->setChildrenAttribute('class', 'level2');
        return $menu;
    }

}