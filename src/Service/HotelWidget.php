<?php

namespace App\Service;

use App\Exception\NoResultException;
use App\Repository\HotelRepository;

class HotelWidget
{
    private $hotelRepository;
    
    public function __construct(HotelRepository $hotelRepository) 
    {
        $this->hotelRepository = $hotelRepository;
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
        
        $result = $data[0];       
        array_walk($result, function(&$value, $key) {
            if ($key == 'average_rating') {
                $value = (int) round($value);
            } 
        });

        return $result;
    }
}
