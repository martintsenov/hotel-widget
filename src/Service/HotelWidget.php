<?php

namespace App\Service;

use App\Exception\NoResultException;
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
     * Get average rating for a hotel
     * 
     * @param int $hotelId
     * @return array
     * @throws NoResultException
     */
    public function getAverageScoreById(int $hotelId): array
    {
        $data = $this->hotelRepository->getAverageScoreById($hotelId);
        
        if (count($data) == 0) {
            throw new NoResultException;
        }

        return $data[0];
    }
}
