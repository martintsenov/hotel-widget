<?php

namespace App\Repository;

use App\Entity\Hotel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Hotel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hotel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hotel[]    findAll()
 * @method Hotel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HotelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Hotel::class);
    }
    
    /**
     * 
     * @param type $hotelId
     * @return type
     */
    public function getAverageScoreById($hotelId)
    {
        /* TBD - Move to use query builder
        $rsm = new ResultSetMapping();
        $query = $this->createNativeQuery('
            SELECT hotel.id, hotel.name, AVG(review.rating) as average_rating  FROM hotel
            LEFT JOIN review on hotel.id = review.hotel_id
            WHERE hotel.id = ?
            GROUP BY hotel.id', $rsm);
        $query->setParameter(1, $hotelId);

        $data = $query->getResult();
        return $data;
        */
        $query = '
            SELECT hotel.id, hotel.name, AVG(review.rating) as average_rating  FROM hotel
            LEFT JOIN review on hotel.id = review.hotel_id
            WHERE hotel.id = '.$hotelId.'
            GROUP BY hotel.id';
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

//    /**
//     * @return Hotel[] Returns an array of Hotel objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hotel
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
