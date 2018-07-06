<?php

namespace App\Controller;

use App\Service\Widget as WidgetService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WidgetController extends Controller
{
    private $widgetService;
    
    public function __construct(WidgetService $widgetService)
    {
        $this->widgetService = $widgetService;
    }

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
