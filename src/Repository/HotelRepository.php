<?php

namespace App\Repository;

use App\Entity\Hotel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use \Doctrine\ORM\Query\Expr as QueryExpression;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hotel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hotel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hotel[]    findAll()
 * @method Hotel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HotelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hotel::class);
    }

    /**
     * 
     * @param type $hotelId
     * @return type
     */
    public function getAverageScoreById(int $hotelId): array
    {
        /*
            SELECT hotel.id, hotel.name, AVG(review.rating) as average_rating  FROM hotel
            LEFT JOIN review on hotel.id = review.hotel_id
            WHERE hotel.id = 1
            GROUP BY hotel.id
        */ 
        $queryBuilder = $this->createQueryBuilder('h')
            ->select('h.id, h.name, AVG(r.rating) as average_rating')
            ->leftJoin('App\Entity\Review', 'r', QueryExpression\Join::WITH, 'h = r.hotel')
            ->andWhere('h.id = :hotelId')
            ->setParameter('hotelId', $hotelId)
            ->groupBy('h.id');
        
        return $queryBuilder
            ->getQuery()
            ->useResultCache(true, 3600)
            ->getArrayResult();
    }
}
