<?php

namespace App\Repository;

use App\Entity\OptionsVoiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OptionsVoiture|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionsVoiture|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionsVoiture[]    findAll()
 * @method OptionsVoiture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionsVoitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OptionsVoiture::class);
    }

    // /**
    //  * @return OptionsVoiture[] Returns an array of OptionsVoiture objects
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
    public function findOneBySomeField($value): ?OptionsVoiture
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
