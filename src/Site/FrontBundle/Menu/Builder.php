<?php

namespace Site\FrontBundle\Menu;

use Knp\Menu\FactoryInterface;
use Kpn\Menu\Iterator\CurrentItemFilterIterator;
use Kpn\Menu\Iterator\RecursiveItemIterator;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Builder of the main menu
 *
 */
class Builder extends ContainerAware {

    public function mainMenu(FactoryInterface $factory, array $options) {

        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav col-lg-5 col-md-5 col-sm-7');
        $menu->setChildrenAttribute('id', 'main-menu');
        $menu->setCurrent($this->container->get('request')->getRequestUri());

        $menu->addChild('Accueil', array(
            'route' => 'site_front_homepage',
            'attributes' => array('class' => 'nav-header')
        ));
        $menu->addChild('Tutoriels', array(
            'route' => 'site_front_tutorial',
            'attributes' => array('class' => 'nav-header')
        ));
        $menu->addChild('A propos', array(
            'route' => 'site_front_about',
            'attributes' => array('class' => 'nav-header')
        ));
        $menu->addChild('Contact', array(
            'route' => 'site_front_contact',
            'attributes' => array('class' => 'nav-header')
        ));

        return $menu;
    }

    /**
     * Permet de générer le BreadCrumb
     * @param \Knp\Menu\FactoryInterface $factory
     * @param array $options
     * 
     * @return \Knp\Menu\Iterator\CurrentItemFilterIterator
     */
    public function breadCrumb(FactoryInterface $factory, array $options) {
        $menu = $this->mainMenu($factory, $options);

        /* @var $matcher \Knp\Menu\Matcher\Matcher */
        $matcher = $this->container->get('knp_menu.matcher');

        $treeIterator = new RecursiveIteratorIterator(
                            new RecursiveItemIterator(
                                new ArrayIterator(
                                        array($menu)
                                )), 
                            RecursiveIteratorIterator::SELF_FIRST);

        $iterator = new CurrentItemFilterIterator($treeIterator, $matcher);

        // Set Current as an empty Item in order to avoid exceptions on knp_menu_get
        $current = new MenuItem('', $factory);

        foreach ($iterator as $item) {
            $item->setCurrent(true);
            $current = $item;
            break;
        }

        return $current;
    }

}
