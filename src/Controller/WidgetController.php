<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WidgetController extends Controller
{
    /**
     * @Route("/widget", name="widget")
     */
    public function index()
    {
        return $this->render('widget/index.html.twig', [
            'controller_name' => 'WidgetController',
        ]);
    }
}
