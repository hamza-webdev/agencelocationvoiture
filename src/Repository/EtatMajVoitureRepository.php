<?php

namespace App\Repository;

use App\Entity\EtatMajVoiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EtatMajVoiture|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatMajVoiture|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatMajVoiture[]    findAll()
 * @method EtatMajVoiture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatMajVoitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtatMajVoiture::class);
    }

    // /**
    //  * @return EtatMajVoiture[] Returns an array of EtatMajVoiture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EtatMajVoiture
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
