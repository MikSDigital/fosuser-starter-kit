<?php

namespace App\Controller\Admin;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class LiveOnController extends Controller
{
    /**
     * @return Response
     * @Route("/dashboard/e-commerce", name="e-commerce")
     */
    public function ECommerce()
    {
        return new Response('Ecommerce');
    }

    /**
     * @return Response
     * @Route("/extra1", name="extra1")
     */
    public function extra1()
    {
        return $this->render('admin/pages/full_dashboard.html.twig');
    }

    /**
     * @return Response
     * @Route("/extra2", name="extra2")
     */
    public function extra2()
    {
        return new Response('extra2');
    }
}