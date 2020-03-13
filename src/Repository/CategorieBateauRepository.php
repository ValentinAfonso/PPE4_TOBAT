<?php

namespace App\Repository;

use App\Entity\CategorieBateau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CategorieBateau|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieBateau|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieBateau[]    findAll()
 * @method CategorieBateau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieBateauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieBateau::class);
    }

    // /**
    //  * @return CategorieBateau[] Returns an array of CategorieBateau objects
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
    public function findOneBySomeField($value): ?CategorieBateau
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
