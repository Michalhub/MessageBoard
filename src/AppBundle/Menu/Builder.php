<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    //annonymus menu
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        // create another menu item
        $menu->addChild('Home', array('route' => 'homepage'));
        $menu->addChild('Register', array('route' => 'fos_user_registration_register'));
        $menu->addChild('Login', array('route' => 'fos_user_security_login'));
        $menu->addChild('Forget password?', array('route' => 'fos_user_resetting_send_email'));
        // you can also add sub level's to your menu's as follows
        //$menu['About Me']->addChild('Edit profile', array('route' => 'register'));

        // ... add more children

        return $menu;
    }
    //logged menu
    public function loggedMainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        // create another menu item
        $menu->addChild('Home', array('route' => 'homepage'));
        $menu->addChild('Show my ads', array('route' => 'ad_index'));
        $menu->addChild('Create Ad', array('route' => 'ad_new'));
        $menu->addChild('LogOut', array('route' => 'fos_user_security_logout'));



        return $menu;
    }

    public function categoriesMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        // create another menu item
        $menu->addChild('Bicycles', array('route' => 'homepage'));
        $menu->addChild('Car', array('route' => 'homepage'));
        $menu->addChild('Motorcycles', array('route' => 'homepage'));
        $menu->addChild( 'Home stuff', array('route' => 'homepage'));



        return $menu;
    }

}