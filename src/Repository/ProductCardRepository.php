<?php

namespace App\Repository;

use App\Entity\ProductCard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductCard|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductCard|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductCard[]    findAll()
 * @method ProductCard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductCardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductCard::class);
    }

    /**
      * @return ProductCard[] Returns an array of ProductCard objects
      */
    public function findByPopularArrivalsField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.popularArrivals = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
        ;
    }
}
