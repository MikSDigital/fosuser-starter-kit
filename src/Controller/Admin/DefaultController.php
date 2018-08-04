<?php

namespace App\Controller\Admin;

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
}
