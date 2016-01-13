<?php

namespace MenuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

		$menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');
        $menu->addChild('Home', array('route' => 'homepage'));
        $menu->addChild('Login', array('route' => 'login_route'));
        $menu->addChild('Register', array('route' => 'user_registration'));

        return $menu;
    }

     public function sideBar(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->setChildrenAttribute('class', 'nav nav-sidebar');
        $menu->addChild('Realtime', array('route' => 'homepage'));

        $menu->addChild('Status', array('route' => 'login_route'));
        $menu->addChild('Position', array('route' => 'user_registration'));

        return $menu;
    }
    public function userMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');
        $menu->addChild('Home', array('route' => 'homepage'));
        $menu->addChild('Profil', array('route' => 'user_homepage'));
        $menu->addChild('Logout', array('route' => 'logout'));

        return $menu;
    }

}