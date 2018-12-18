<?php

namespace App\Repository;

use App\Entity\CustomizablePart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CustomizablePart|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomizablePart|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomizablePart[]    findAll()
 * @method CustomizablePart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomizablePartRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CustomizablePart::class);
    }

    // /**
    //  * @return CustomizablePart[] Returns an array of CustomizablePart objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CustomizablePart
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
