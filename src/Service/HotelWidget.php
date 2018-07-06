<?php

namespace App\Service;

use App\Repository\HotelRepository;
use App\Repository\ReviewRepository;

class HotelWidget
{
    private $hotelRepository;
    private $reviewRepository;
    
    public function __construct(
        HotelRepository $hotelRepository, 
        ReviewRepository $reviewRepository
    ) {
        $this->hotelRepository = $hotelRepository;
        $this->reviewRepository = $reviewRepository;
    }
    
    /**
     * 
     * @param int $hotelId
     * @return type
     */
    public function getAverageScoreById(int $hotelId): array
    {
        $data = $this->hotelRepository->getAverageScoreById($hotelId);
        
        return $data[0];
    }
}
