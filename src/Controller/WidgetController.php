<?php

namespace App\Controller;

use App\Exception\NoResultException;
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
     * @Route("/widget/{id}", name="widget")
     */
    public function index($id)
    {        
        try {
            $averageScore = $this->hotelWidgetService->getAverageScoreById($id);
            
            return $this->render('widget/index.html.twig', [
                'controller_name' => 'WidgetController',
                'hotel' => $averageScore['name'],
                'averageRating' => $averageScore['average_rating']
            ]);
        } catch (NoResultException $ex) {
            return $this->render('widget/no-result.html.twig', [
                'controller_name' => 'WidgetController',
                'message' => 'No result found',
            ]);
        } catch (\Exception $ex) {
        }
    }
}
