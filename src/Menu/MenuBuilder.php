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

        $home = $factory->createItem('Home', [
            'route' => 'admin_dasboard',
        ]);
        $home->setAttribute('icon', 'fa fa-home');

        $menu->addChild($home);
//        $menu['Home']->setLabel('Главная');
//        $menu['Home']->setAttribute('id', 'menu_admin_pages');
//        $menu['Home']->setAttribute('class', 'submenu');


        $dashboard = $factory->createItem('Dashboard', [
            'route' => 'dashboard'
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

        return $menu;
    }
}