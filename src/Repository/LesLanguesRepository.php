<?php

namespace App\Repository;

use App\Entity\LesLangues;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LesLangues|null find($id, $lockMode = null, $lockVersion = null)
 * @method LesLangues|null findOneBy(array $criteria, array $orderBy = null)
 * @method LesLangues[]    findAll()
 * @method LesLangues[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LesLanguesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LesLangues::class);
    }

    // /**
    //  * @return LesLangues[] Returns an array of LesLangues objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LesLangues
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
