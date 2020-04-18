<?php

namespace App\Repository;

use App\Entity\FileAttachementVoiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FileAttachementVoiture|null find($id, $lockMode = null, $lockVersion = null)
 * @method FileAttachementVoiture|null findOneBy(array $criteria, array $orderBy = null)
 * @method FileAttachementVoiture[]    findAll()
 * @method FileAttachementVoiture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FileAttachementVoitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FileAttachementVoiture::class);
    }

    // /**
    //  * @return FileAttachementVoiture[] Returns an array of FileAttachementVoiture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FileAttachementVoiture
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
