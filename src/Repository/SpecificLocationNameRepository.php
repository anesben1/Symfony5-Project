<?php

namespace App\Repository;

use App\Entity\SpecificLocationName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpecificLocationName|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecificLocationName|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecificLocationName[]    findAll()
 * @method SpecificLocationName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecificLocationNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecificLocationName::class);
    }

    // /**
    //  * @return SpecificLocationName[] Returns an array of SpecificLocationName objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpecificLocationName
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
