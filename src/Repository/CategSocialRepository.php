<?php

namespace App\Repository;

use App\Entity\CategSocial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CategSocial|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategSocial|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategSocial[]    findAll()
 * @method CategSocial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategSocialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategSocial::class);
    }

    // /**
    //  * @return CategSocial[] Returns an array of CategSocial objects
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
    public function findOneBySomeField($value): ?CategSocial
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
