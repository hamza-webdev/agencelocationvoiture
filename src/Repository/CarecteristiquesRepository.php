<?php

namespace App\Repository;

use App\Entity\Carecteristiques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Carecteristiques|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carecteristiques|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carecteristiques[]    findAll()
 * @method Carecteristiques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarecteristiquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carecteristiques::class);
    }

    // /**
    //  * @return Carecteristiques[] Returns an array of Carecteristiques objects
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
    public function findOneBySomeField($value): ?Carecteristiques
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
