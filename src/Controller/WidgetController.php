<?php

namespace App\Controller;

use App\Service\HotelWidget as HotelWidgetService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WidgetController extends Controller
{
    private $hotelWidgetService;
    
    public function __construct(HotelWidgetService $hotelWidgetService)
    {
        $this->hotelWidgetService = $hotelWidgetService;
    }

    /**
     * @Route("/widget", name="widget")
     */
    public function index()
    {
        $averageScore = $this->hotelWidgetService->getAverageScoreById(1);
        return $this->render('widget/index.html.twig', [
            'controller_name' => 'WidgetController',
            'hotel' => $averageScore['name'],
            'averageRating' => $averageScore['average_rating']
        ]);
    }
}
