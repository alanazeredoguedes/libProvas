<?php

namespace App\Application\LibProvas\DisciplinaBundle\Repository;

use App\Application\LibProvas\DisciplinaBundle\Entity\Disciplina;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Disciplina>
 *
 * @method Disciplina|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disciplina|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disciplina[]    findAll()
 * @method Disciplina[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisciplinaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disciplina::class);
    }

    // /**
    //  * @return Disciplina[] Returns an array of Disciplina objects
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
    public function findOneBySomeField($value): ?Disciplina
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
