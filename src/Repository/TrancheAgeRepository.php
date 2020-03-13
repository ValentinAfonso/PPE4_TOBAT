<?php

namespace App\Repository;

use App\Entity\TrancheAge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TrancheAge|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrancheAge|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrancheAge[]    findAll()
 * @method TrancheAge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrancheAgeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrancheAge::class);
    }

    // /**
    //  * @return TrancheAge[] Returns an array of TrancheAge objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TrancheAge
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
