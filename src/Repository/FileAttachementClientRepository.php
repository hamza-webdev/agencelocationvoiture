<?php

namespace App\Repository;

use App\Entity\FileAttachementClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FileAttachementClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method FileAttachementClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method FileAttachementClient[]    findAll()
 * @method FileAttachementClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FileAttachementClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FileAttachementClient::class);
    }

    // /**
    //  * @return FileAttachementClient[] Returns an array of FileAttachementClient objects
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
    public function findOneBySomeField($value): ?FileAttachementClient
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
