<?php

namespace App\Service;

use App\Repository\HotelRepository;
use App\Repository\ReviewRepository;

class Widget
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
     * @param int $id
     * @return type
     */
    public function getHotelById(int $id)
    {
        return $this->hotelRepository->find($id);
    }
}
