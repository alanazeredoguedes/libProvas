<?php

namespace App\Application\LibProvas\GradeCurricularBundle\Repository;

use App\Application\LibProvas\GradeCurricularBundle\Entity\GradeCurricular;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GradeCurricular|null find($id, $lockMode = null, $lockVersion = null)
 * @method GradeCurricular|null findOneBy(array $criteria, array $orderBy = null)
 * @method GradeCurricular[]    findAll()
 * @method GradeCurricular[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GradeCurricularRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GradeCurricular::class);
    }

    // /**
    //  * @return GradeCurricular[] Returns an array of GradeCurricular objects
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
    public function findOneBySomeField($value): ?GradeCurricular
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
