<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        // create another menu item
        $menu->addChild('Home', array('route' => 'homepage'));
        $menu->addChild('Register', array('route' => 'fos_user_registration_register'));
        $menu->addChild('Login', array('route' => 'fos_user_security_login'));

        // you can also add sub level's to your menu's as follows
        //$menu['About Me']->addChild('Edit profile', array('route' => 'register'));

        // ... add more children

        return $menu;
    }
}