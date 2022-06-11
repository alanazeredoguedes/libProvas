<?php

namespace App\Application\LibProvas\TipoProvaBundle\Repository;

use App\Application\LibProvas\TipoProvaBundle\Entity\TipoProva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoProva|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoProva|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoProva[]    findAll()
 * @method TipoProva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoProvaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoProva::class);
    }

    // /**
    //  * @return TipoProva[] Returns an array of TipoProva objects
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
    public function findOneBySomeField($value): ?TipoProva
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
