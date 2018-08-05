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
        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'nav side-menu'
            ]
        ]);


        $menu->addChild('Home', [
            'route' => 'admin_dasboard',
        ]);
        $menu['Home']->setLabel('Главная');
        $menu['Home']->setAttribute('id', 'menu_admin_pages');
        $menu['Home']->setAttribute('class', 'submenu');


        // ... add more children

        return $menu;
    }
}