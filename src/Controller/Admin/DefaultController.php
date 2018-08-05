<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="admin_dasboard")
     */
    public function index()
    {
        return $this->render('admin/pages/full_dashboard.html.twig');
    }

    /**
     * @return Response
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard()
    {
        return new Response('Dashboard');
    }

    /**
     * @return Response
     * @Route("/dashboard1", name="dashboard1")
     */
    public function dashboard1()
    {
        return new Response('Dashboard1');
    }

    /**
     * @return Response
     * @Route("/dashboard2", name="dashboard2")
     */
    public function dashboard2()
    {
        return new Response('Dashboard2');
    }
}
