<?php

namespace App\Menu;


use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $factory = $this->factory;

        $menu = $factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'nav side-menu'
            ]
        ]);

        /**  HOME menu  **/

        $home = $factory->createItem('Home', [
            'route' => 'admin_dasboard',
            'childrenAttributes' => [
                'class' => 'nav child_menu'
            ]
        ]);
        $home->setAttribute('icon', 'fa fa-home');
        $home->setLabel('Главная');

        $menu->addChild($home);

//        leave it here as a reminder

//        $menu['Home']->setLabel('Главная');
//        $menu['Home']->setAttribute('id', 'menu_admin_pages');
//        $menu['Home']->setAttribute('class', 'submenu');


        $dashboard = $factory->createItem('Dashboard', [
            'route' => 'admin_dasboard'
        ]);


        $dashboard1 = $factory->createItem('Dashboard1', [
            'route' => 'dashboard1'
        ]);

        $dashboard2 = $factory->createItem('Dashboard2', [
            'route' => 'dashboard2'
        ]);

        $home->addChild($dashboard);
        $home->addChild($dashboard1);
        $home->addChild($dashboard2);

        /**  end of HOME menu  **/

        return $menu;
    }
}