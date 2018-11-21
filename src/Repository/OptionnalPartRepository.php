<?php

namespace App\Repository;

use App\Entity\OptionnalPart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OptionnalPart|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionnalPart|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionnalPart[]    findAll()
 * @method OptionnalPart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionnalPartRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OptionnalPart::class);
    }

    // /**
    //  * @return OptionnalPart[] Returns an array of OptionnalPart objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OptionnalPart
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
