<?php

namespace App\Repository;

use App\Entity\ProfessionnelDeSante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProfessionnelDeSante|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfessionnelDeSante|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfessionnelDeSante[]    findAll()
 * @method ProfessionnelDeSante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessionnelDeSanteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfessionnelDeSante::class);
    }

    // /**
    //  * @return ProfessionnelDeSante[] Returns an array of ProfessionnelDeSante objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProfessionnelDeSante
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
